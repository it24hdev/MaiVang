<?php

namespace App\Web\Services\Production;

use App\Admin\Models\PostCategory;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\Customer;
use App\Admin\Models\Menu;
use App\Admin\Models\Order;
use App\Admin\Models\Position;
use App\Admin\Models\Post;
use App\Admin\Models\Product;
use App\Web\Services\Interfaces\HomeServiceInterface;
use Jenssegers\Agent\Agent;

class HomeService extends BaseService implements HomeServiceInterface
{
    public function index()
    {
        $menu = Menu::get();
        $slider = Position::where('type', 'slider')->get();
        $categoryProduct = ProductCategory::where('show', 1)->where('parent', 0)->get();
        $agent = new Agent();
        if ($agent->isPhone()) {
            return view('web.content.home_mobile', compact('menu', 'categoryProduct', 'quotes', 'slider'));
        } else {
            $active = route('home');
            $animationProduct = Product::where('show', 1)->inRandomOrder()->take(20)->get()->pluck('name');
            return view('web.content.home', compact('menu', 'categoryProduct',  'slider', 'active', 'animationProduct'));
        }
    }

    public function emailOrder($request){
        $checkEmail = Customer::where('email', $request->email)->first();
        if($checkEmail){
            $customer = $checkEmail;
        }
        else{
            $input = [
                'name' => $request->email,
                'email' => $request->email,
            ];
            $customer = Customer::create($input);
        }

        $inputOrder = [
            'code' => 'DH' . rand(1, 99999999),
            'customers_id' => $customer->id,
            'status' => 1,
        ];
        Order::create($inputOrder);
        return response()->json(['success' => true]);
    }

    public function searchPerfect($request)
    {
        if ($request->keyword) {
            $products = Product::where('name', 'like', '%' . $request->keyword . '%')->where('show', 1)->limit(10)->get();
            return response()->json(['products' => $products]);
        } else {
            return response()->json();
        }
    }

    public function loadProductByCategory($request){
        $category = ProductCategory::where('show', 1)
            ->find($request->cat_id);

        if ($category) {
            $categoryName = $category->name;
            $products = $category->Products()
                ->where('show', 1)
                ->limit(16)
                ->get();
            foreach ($products as $product) {
                $product->category_name = $categoryName;
            }
            return response()->json(['products' => $products]);
        } else {
            return response()->json(['products' => '']);
        }

    }

    public function getSolution($request){
        $solution = Post::where('published_at','<=',now())->orderBy('published_at', 'asc')->where('type', 3)->limit(10)->get();
        return response()->json(['success' => true,'solution' => $solution]);
    }

    public function getCategoryProduct($request){
        $categoryProduct = ProductCategory::where('show', 1)->get();
        return response()->json(['success' => true, 'categoryProduct' => $categoryProduct]);
    }

    public function getCategoryImage()
    {
        $categoriesImage = PostCategory::whereHas('Posts', function ($query) {
            $query->where('type', 4);
        })->get();

        foreach ($categoriesImage as $key => $item) {
            $arr = [];
            foreach ($item->Posts()->where('type', 4)->limit(5)->distinct()->get() as $post) {
                $arr_post = [
                    'name' => $post->name,
                    'image' => $post->image,
                    'slug' => $post->slug,
                    'cat_id' => $item->id,
                ];
                array_push($arr,$arr_post);
            }
            $item->post_data = $arr;
        }
        return response()->json(['success' => true, 'categoriesImage' => $categoriesImage]);
    }

    public function getProductAll($request){
        $products = Product::where('show', 1)->limit(16)->get();
        foreach ($products as $item) {
            if($item->CategoryProducts->count() > 0){
                $item->category_name = $item->CategoryProducts->first()->name;
            }
        }
        return response()->json(['success' => true, 'products' => $products]);
    }

    public function getCustomer($request){
        $customers = Customer::where('show', 1)->limit(16)->get();
        return response()->json(['success' => true, 'customers' => $customers]);
    }

    public function getVideo($request){
        $videos = Post::where('published_at','<=',now())->orderBy('published_at', 'asc')->where('type', 2)->limit(10)->get();
        foreach ($videos as $item) {
            $item->user_name = $item->User->name;
        }
        return response()->json(['success' => true, 'videos' => $videos]);
    }

    public function getNews($request){
        $news = Post::where('published_at','<=',now())->orderBy('published_at', 'asc')->where('type', 1)->limit(10)->get();
        foreach ($news as $key => $item) {
            $item->user_name = $item->User->name;
            if($item->CategoryPosts->count() > 0){
                $item->category_name = $item->CategoryPosts->first()->name;
                $item->category_slug = $item->CategoryPosts->first()->slug;
            }
        }
        return response()->json(['success' => true, 'news' => $news]);
    }


}
