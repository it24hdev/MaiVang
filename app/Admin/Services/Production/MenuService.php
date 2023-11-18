<?php

namespace App\Admin\Services\Production;

use App\Admin\Models\PostCategory;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\Menu;
use App\Admin\Models\MenuItem;
use App\Admin\Models\Position;
use App\Admin\Services\Interfaces\MenuServiceInterface;
use Illuminate\Support\Facades\DB;

class MenuService extends BaseService implements MenuServiceInterface
{
    public function index($request)
    {
        $position = Position::where('type','menu')->get();
        $menus = Menu::get();
        $menus_id = $request->menu;
        $thisMenu = Menu::where(function ($query) use ($menus_id){
            if(!empty($menus_id)){
                $query->where('id',$menus_id);
            }
        })->first();
        $categoryPost = PostCategory::where('show',1)->get();
        $categoryProduct = ProductCategory::where('show',1)->get();

        return view('admin.content.menu.index', compact( 'thisMenu','menus','categoryPost','categoryProduct','position'));
    }

    public function update($request)
    {
        try {
            if(!empty($request->menu_item_db_id)){
                MenuItem::whereNotIn('id', $request->menu_item_db_id)->where('menus_id', $request->menus_id)->delete();
                foreach ($request->menu_item_db_id as $key => $item){
                    $menuItem = MenuItem::find($item);
                    $input = [
                        'name' => $request->menu_item_name[$item],
                        'parent' => $request->menu_item_parent_id[$item],
                        'depth' => $request->menu_item_depth[$item],
                        'redirect' => $request->menu_item_redirect[$item],
                        'html_field' => $request->menu_item_html_field[$item],
                        'position' => $key,
                    ];
                    $menuItem->update($input);
                }
            } else {
                MenuItem::where('menus_id', $request->menus_id)->delete();
            }
            Menu::find($request->menus_id)->update(['name' => $request->menu_name]);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function storeItem($request)
    {
        $max_position = MenuItem::select(DB::raw('COALESCE(MAX(position),0) as number_position'))->where('menus_id', $request->menus_id)->first();
        $input = [
            'name' => $request->name,
            'redirect' => $request->redirect,
            'position' => $max_position->number_position + 1,
            'menus_id' => $request->menus_id,
            'html_field' => $request->html_field,
        ];
        $newMenuItem = MenuItem::create($input);
        $menuItem = MenuItem::find($newMenuItem->id);
        return response()->json(['success' => true, 'menuItem' => $menuItem]);
    }

    public function storeMenu($request)
    {
        $menu = Menu::create(['name' => $request->name]);
        return response()->json(['success' => true, 'menu' => $menu]);
    }

    public function destroyMenu($request){
        try {
            DB::beginTransaction();
            $menu = Menu::find($request->id);
            $menu->MenuItems()->delete();
            foreach ($menu->Position as $position) {
                $position->update(['object_id' => 0]);
            }
            $menu->delete();
            DB::commit();
            return response()->json(['success' => true]);
        }
        catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function position($request){
        try {
            DB::beginTransaction();
            Position::find($request->position)->update(['object_id' => intval($request->object_id)]);
            DB::commit();
            return response()->json(['success' => true]);
        }
        catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }
}
