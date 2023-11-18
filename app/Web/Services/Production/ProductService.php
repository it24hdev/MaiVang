<?php

namespace App\Web\Services\Production;

use App\Admin\Models\ProductCategory;
use App\Admin\Models\Menu;
use App\Admin\Models\Position;
use App\Admin\Models\Product;
use App\Admin\Models\Quote;
use App\Web\Services\Interfaces\ProductServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService extends BaseService implements ProductServiceInterface
{
    public function detailProduct($request)
    {
        $pathInfo = $request->getPathInfo();
        $slug = Str::afterLast($pathInfo, '/');
        $product = Product::where('slug', $slug)->first();
        $recentProducts = Product::where('show', 1)->limit(7)->get();
        $menu = Menu::get();
        $position = Position::where('type', 'menu')->get();
        $active = route('list_product');
        $quotes = ProductCategory::where('show', 1)->where('offer',1)->get();
        $animationProduct = Product::where('show', 1)->inRandomOrder()->take(20)->get()->pluck('name');;
        return view('web.content.detail_product', compact('product', 'recentProducts', 'menu', 'position', 'active', 'quotes', 'animationProduct'));
    }

    public function categoryProduct($request)
    {
        $thisCategory = $category = "";
        $search = $request->search;
        if ($request->slug) {
            $thisCategory = ProductCategory::where('show', 1)->where('slug', $request->slug)->first();
            $products = $thisCategory->Products()
                ->when($search, function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->where('show', 1)->paginate(6);
            $products->appends(['search' => $search]);
            $category = $thisCategory->children;
            if ($category->count() == 0) {
                if ($thisCategory->parent != 0) {
                    $parentCategory = ProductCategory::where('show', 1)->where('id', $thisCategory->parent)->first();
                    $category = $parentCategory->children;
                } else {
                    $category = ProductCategory::where('show', 1)->where('parent', 0)->get();
                }
            }
        } else {
            $products = Product::when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->where('show', 1)->paginate(6);
            $category = ProductCategory::where('show', 1)->where('parent', 0)->get();
        }
        $products->appends(['search' => $search]);
        $menu = Menu::get();
        $position = Position::where('type', 'menu')->get();
        $active = route('list_product');
        $quotes = ProductCategory::where('show', 1)->where('offer',1)->get();
        $animationProduct = Product::where('show', 1)->inRandomOrder()->take(20)->get()->pluck('name');;
        return view('web.content.list_product', compact('products', 'category', 'menu', 'position', 'active', 'quotes', 'animationProduct', 'thisCategory'));
    }

    public function loadProducts($request)
    {
        $products = Product::where('show', 1)->get();
        return response()->json(['products' => $products]);
    }

}
