<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\PostCategory;
use App\Admin\Services\Interfaces\PostCategoryServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostCategoryService extends BaseService implements PostCategoryServiceInterface
{
    public function index()
    {
        $data = PostCategory::get();
        $categoryPosts = array();
        Common::recursive($data, $parents = 0, $level = 0, $categoryPosts);
        return view('admin.content.category_post.index', compact('categoryPosts'));
    }

    public function load(){
        $data = PostCategory::orderBy('number_order')->get();
        $lists = [];
        Common::recursive($data, 0, 0, $lists);
        $hasChild = [];
        foreach ($lists as $item) {
            if ($item->children->isNotEmpty()) {
                array_push($hasChild, $item->id);
            }
            $count_post = $item->Posts->count();
            $item->setAttribute('count_post',$count_post);
        }
        return response()->json(['categoryPosts' => $lists, 'hasChild' => $hasChild]);
    }

    public function updateLocation($request)
    {
        try {
            $max_order = PostCategory::select(DB::raw('COALESCE(MAX(number_order),0) as order_nb'))->where('parent', $request->parent)->first();
            $input = [
                'parent' => $request->parent,
                'number_order' => $max_order->order_nb + 1,
            ];
            PostCategory::find($request->id)->update($input);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function store($request)
    {
        $max_order = PostCategory::select(DB::raw('COALESCE(MAX(number_order),0) as order_nb'))->where('parent', $request->parent)->first();
        try {
            $input = [
                'name' => $request->name,
                'parent' => $request->parent,
                'slug' => $request->slug,
                'redirect' => $request->redirect,
                'show' => $request->show,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'number_order' => $max_order->order_nb + 1,
            ];
            DB::beginTransaction();
            PostCategory::create($input);
            Common::createShortUrl($request->slug,4,null);
            DB::beginTransaction();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function edit($request)
    {
        try {
            $categoryPost = PostCategory::find($request->id);
            return response()->json(['success' => true, 'categoryPost' => $categoryPost]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function update($request)
    {
        $categoryPost = PostCategory::find($request->id);
        try {
            $input = [
                'name' => $request->name,
                'slug' => $request->slug,
                'redirect' => $request->redirect,
                'show' => $request->show,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ];
            Common::updateShortUrl($categoryPost->slug,$request->slug,null);
            $categoryPost->update($input);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        $categoryProduct = PostCategory::find($request->id);
        $data = PostCategory::get();
        $childs = array();
        Common::recursive($data, $parents = $request->id, $level = 0, $childs);
        try {
            DB::beginTransaction();
            if ($request->deleteChild == 1) {
                foreach ($childs as $item) {
                    $child = PostCategory::find($item->id);
                    $child->Posts()->detach();
                    $child->delete();
                }
            } else {
                foreach ($childs as $item) {
                    $child = PostCategory::find($item->id);
                    $child->update([
                        'parent' => 0,
                        'number_order' => 0
                    ]);
                }
            }
            $categoryProduct->Posts()->detach();
            Common::deleteShortUrl($categoryProduct->slug);
            $categoryProduct->delete();
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }
}
