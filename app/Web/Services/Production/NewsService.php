<?php

namespace App\Web\Services\Production;

use App\Admin\Models\PostCategory;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\City;
use App\Admin\Models\Menu;
use App\Admin\Models\Position;
use App\Admin\Models\Post;
use App\Admin\Models\Product;
use App\Admin\Models\Quote;
use App\Admin\Models\Tag;
use App\Web\Services\Interfaces\NewsServiceInterface;
use function Doctrine\Common\Cache\Psr6\get;

class NewsService extends BaseService implements NewsServiceInterface
{
    public function index($request)
    {
        $search = $request->search;
        $posts = Post::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->where('published_at', '<=', now())->where('type', 1)->with('Tags')->paginate(6);
        $posts->appends(['search' => $search]);
        $tags = collect();
        foreach ($posts as $item) {
            $tags->push($item->Tags);
        }
        $tags = $tags->flatten()->unique();
        $recentPosts = Post::where('published_at', '<=', now())->orderBy('published_at', 'asc')->paginate(3);
        $categoryPost = PostCategory::get();
        $menu = Menu::get();
        $position = Position::where('type', 'menu')->get();
        $active = route('news');
        $quotes = ProductCategory::where('show', 1)->where('offer',1)->get();
        $animationProduct = Product::where('show', 1)->inRandomOrder()->take(20)->get()->pluck('name');
        return view('web.content.news', compact('posts', 'recentPosts', 'categoryPost', 'tags', 'menu', 'position', 'active', 'quotes', 'animationProduct'));
    }
}
