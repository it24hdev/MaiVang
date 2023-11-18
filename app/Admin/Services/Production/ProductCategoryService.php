<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\Attribute;
use App\Admin\Models\ProductCategory;
use App\Admin\Services\Interfaces\ProductCategoryServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use function League\Flysystem\has;
use function Nette\Utils\setAttribute;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public function index()
    {
        $data = ProductCategory::get();
        $categoryProducts = array();
        Common::recursive($data, $parents = 0, $level = 0, $categoryProducts);
        return view('admin.content.category_product.index', compact('categoryProducts'));
    }

    public function load($request)
    {
        $data = ProductCategory::orderBy('number_order')->get();
        $lists = [];
        Common::recursive($data, 0, 0, $lists);
        $hasChild = [];
        foreach ($lists as $item) {
            if ($item->children->isNotEmpty()) {
                array_push($hasChild, $item->id);
            }
            $count_product = $item->Products->count();
            $item->setAttribute('count_product',$count_product);
            $count_attribute = $item->Attributes->count();
            $item->setAttribute('count_attribute',$count_attribute);
        }
        return response()->json(['categoryProducts' => $lists, 'hasChild' => $hasChild]);
    }

    public function updateLocation($request)
    {
        try {
            $max_order = ProductCategory::select(DB::raw('COALESCE(MAX(number_order),0) as order_nb'))->where('parent', $request->parent)->first();
            $input = [
                'parent' => $request->parent,
                'number_order' => $max_order->order_nb + 1,
            ];
            ProductCategory::find($request->id)->update($input);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function store($request)
    {
        $nameImage = $nameIcon = ProductCategory::noImage;

        if ($request->hasFile('image')) {
            $nameImage = Str::slug($request->name,'_') . '_' . time() . '.' . $request->image->extension();
        }

        if ($request->hasFile('icon')) {
            $nameIcon = Str::slug($request->name,'_') . '_icon_' . time() . '.' . $request->icon->extension();
        }

        $max_order = ProductCategory::select(DB::raw('COALESCE(MAX(number_order),0) as order_nb'))->where('parent', $request->parent)->first();
        try {
            $input = [
                'name' => $request->name,
                'parent' => $request->parent,
                'slug' => $request->slug,
                'redirect' => $request->redirect,
                'show' => $request->show,
                'offer' => $request->offer,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'icon' => $nameIcon,
                'image' => $nameImage,
                'number_order' => $max_order->order_nb + 1,
            ];
            ProductCategory::create($input);
            Common::createShortUrl($request->slug,3,null);
            $folder = public_path('media/category_products');
            File::ensureDirectoryExists($folder);
            if ($request->hasFile('image')) {
                Common::uploadImage($request->image, $nameImage, $folder);
            }
            if ($request->hasFile('icon')) {
                Common::resizeImage($request->icon, $nameIcon, 150, 150, $folder);
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        $categoryProduct = ProductCategory::find($request->id);
        $data = ProductCategory::get();
        $childs = array();
        Common::recursive($data, $parents = $request->id, $level = 0, $childs);
        try {
            DB::beginTransaction();
            if ($request->deleteChild == 1) {
                foreach ($childs as $item) {
                   $child = ProductCategory::find($item->id);
                   $child->Attributes()->detach();
                   $child->Products()->detach();
                   $child->delete();
                }
            } else {
                foreach ($childs as $item) {
                    $child = ProductCategory::find($item->id);
                    $child->update([
                        'parent' => 0,
                        'number_order' => 0
                    ]);
                }
            }
            $categoryProduct->Attributes()->detach();
            $categoryProduct->Products()->detach();
            Common::deleteShortUrl($categoryProduct->slug);
            $categoryProduct->delete();
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function destroyAttribute($request)
    {
        try {
            $category_product = ProductCategory::find($request->category_product_id);
            $category_product->Attributes()->detach($request->attribute_id);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function edit($request)
    {
        try {
            $categoryProduct = ProductCategory::find($request->id);
            $attributeCategoryProduct = $categoryProduct->Attributes;
            foreach ($attributeCategoryProduct as $item){
                $item->setAttribute('count_attr', $item->children->count());
                $item->setAttribute('order',$item->pivot->number_order);
                $item->setAttribute('category_product_id',$item->pivot->category_product_id);
            }
            return response()->json(['success' => true, 'categoryProduct' => $categoryProduct,'attributeCategoryProduct' => $attributeCategoryProduct]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function loadAttribute($request)
    {
        try {
            $categoryProduct = ProductCategory::find($request->id);
            $attributeCategoryProduct = $categoryProduct->Attributes;
            foreach ($attributeCategoryProduct as $item){
                $item->setAttribute('count_attr', $item->children->count());
                $item->setAttribute('order',$item->pivot->number_order);
                $item->setAttribute('category_product_id',$item->pivot->category_product_id);
            }
            return response()->json(['success' => true, 'attributeCategoryProduct' => $attributeCategoryProduct, 'categoryProduct' => $categoryProduct]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function addAttribute($request)
    {
        $attribute = $request->id;
        return view('admin.content.category_product.add_attribute', compact('attribute'));
    }

    public function loadAddAttribute($request){
        $categoryProduct = ProductCategory::find($request->id);
        $attributeAdded = [];
        foreach ($categoryProduct->Attributes as $item){
            array_push($attributeAdded,$item->id);
        }
        $attribute = Attribute::where('parent',0)->whereNotIn('id',$attributeAdded)->get();
        return response()->json(['attribute' => $attribute]);
    }

    public function addingAttribute($request){
        try {
            $category_product = ProductCategory::find($request->category_product_id);
            $category_product->Attributes()->attach($request->attribute_id);
            return response()->json(['success' => true]);
        }
        catch (\Exception $exception){
            return response()->json(['success' => false]);
        }
    }

    public function update($request)
    {
        $categoryProduct = ProductCategory::find($request->id);
        $nameOldImage = $categoryProduct->image;
        $nameOldIcon = $categoryProduct->icon;
        if ($request->hasFile('image')) {
            $nameImage = Str::slug($request->name,'_') . '_' . time() . '.' . $request->image->extension();
        } else {
            $nameImage = $nameOldImage;
        }
        if ($request->hasFile('icon')) {
            $nameIcon = Str::slug($request->name,'_') . '_icon_' . time() . '.' . $request->icon->extension();
        } else {
            $nameIcon = $nameOldIcon;
        }
        try {
            $input = [
                'name' => $request->name,
                'slug' => $request->slug,
                'redirect' => $request->redirect,
                'show' => $request->show,
                'offer' => $request->offer,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'icon' => $nameIcon,
                'image' => $nameImage,
            ];
            Common::updateShortUrl($categoryProduct->slug,$request->slug,null);
            $categoryProduct->update($input);
            $folder = public_path('media/category_products');
            if ($request->hasFile('image')) {
                File::ensureDirectoryExists($folder);
                Common::deleteImage($nameOldImage, $folder);
                Common::uploadImage($request->image, $nameImage, $folder);
            }
            if ($request->hasFile('icon')) {
                File::ensureDirectoryExists($folder);
                Common::deleteImage($nameOldIcon, $folder);
                Common::resizeImage($request->icon, $nameIcon, 50, 50, $folder);
            }
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }
}
