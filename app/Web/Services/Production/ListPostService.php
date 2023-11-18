<?php

namespace App\Web\Services\Production;

use App\Admin\Models\PostCategory;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\Menu;
use App\Admin\Models\Position;
use App\Admin\Models\Post;
use App\Admin\Models\Product;
use App\Admin\Models\Quote;
use App\Web\Services\Interfaces\ListPostServiceInterface;

class ListPostService extends BaseService implements ListPostServiceInterface
{
    public function index($request)
    {
        $search = $request->search;
        $topic = PostCategory::where('slug', $request->slug)->first();
        $posts = $topic->Posts()->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->where('published_at', '<=', now())->where('type', 1)->paginate(5);
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
        $animationProduct = Product::where('show', 1)->inRandomOrder()->take(20)->get()->pluck('name');;
        return view('web.content.list_post', compact('posts', 'recentPosts', 'categoryPost', 'tags', 'topic', 'menu', 'position', 'active', 'quotes', 'animationProduct'));
    }
}
