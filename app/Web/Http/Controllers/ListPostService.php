<?php

namespace App\Web\Services\Production;

use App\Admin\Models\PostCategory;
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
        $topic = PostCategory::where('slug',$request->slug)->first();
        $posts = $topic->Posts()->where(function ($query) use ($search){
            if($search){
                $query->where('name','like','%'.$search.'%');
            }
        })->where('type',1)->paginate(5);
        if($search) {
            $posts->appends(['search' => $search]);
        }
        $tags = collect();
        foreach($posts as $item){
            $tags->push($item->Tags);
        }
        $tags = $tags->flatten()->unique();
        $recentPosts = Post::orderBy('published_at','asc')->paginate(3);
        $categoryPost = PostCategory::limit(4)->get();
        $menu = Menu::get();
        $position = Position::where('type','menu')->get();
        $active = route('news');
        $quotes = Quote::get();
        $animationProduct = Product::where('show',1)->inRandomOrder()->take(20)->get();
        return view('web.content.list_post',compact('posts','recentPosts','categoryPost','tags','topic','menu','position','active','quotes','animationProduct'));
    }
}
