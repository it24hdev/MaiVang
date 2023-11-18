<?php

namespace App\Web\Services\Production;

use App\Admin\Models\PostCategory;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\Menu;
use App\Admin\Models\Position;
use App\Admin\Models\Post;
use App\Admin\Models\Product;
use App\Admin\Models\Quote;
use App\Web\Services\Interfaces\PostServiceInterface;
use Illuminate\Support\Str;

class PostService extends BaseService implements PostServiceInterface
{
    public function index($request)
    {
        $pathInfo = $request->getPathInfo();
        $slug = Str::afterLast($pathInfo, '/');
        $posts = Post::where('published_at','<=',now())->where('slug',$slug)->first();
        $recentPosts = Post::where('published_at','<=',now())->orderBy('published_at','asc')->where('type',1)->paginate(3);
        $randomPosts = Post::inRandomOrder()->where('published_at','<=',now())->where('type',1)->paginate(3);
        $categoryPost = PostCategory::get();
        $menu = Menu::get();
        $position = Position::where('type','menu')->get();
        $active = route('news');
        $quotes = ProductCategory::where('show', 1)->where('offer',1)->get();
        $animationProduct = Product::where('show',1)->inRandomOrder()->take(20)->get()->pluck('name');
        $tableOfContent = $this->tableOfContent($posts->description);
        return view('web.content.article',compact('tableOfContent','posts','recentPosts','categoryPost','randomPosts','menu','position','active','quotes','animationProduct'));
    }

    public function tableOfContent($html){
        preg_match_all('/<h([1-6])*[^>]*>(.*?)<\/h[1-6]>/',$html,$matches);

        $index = "<ul>";
        $prev = 2;

        foreach ($matches[0] as $i => $match){

            $curr = $matches[1][$i];
            $text = strip_tags($matches[2][$i]);
            $slug = strtolower(str_replace("--","-",preg_replace('/[^\da-z]/i', '-', $text)));
            $anchor = '<a name="'.$slug.'">'.$text.'</a>';
            $html = str_replace($text,$anchor,$html);

            $prev <= $curr ?: $index .= str_repeat('</ul>',($prev - $curr));
            $prev >= $curr ?: $index .= "<ul>";

            $index .= '<li><a href="#'.$slug.'">'.$text.'</a></li>';

            $prev = $curr;
        }

        $index .= "</ul>";
        if($index == "<ul></ul>"){
            $index = null;
        }

        return ["html" => $html, "index" => $index];
    }
}
