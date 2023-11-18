<?php

namespace Database\Seeders;

use App\Admin\Models\PostCategory;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\Page;
use App\Admin\Models\Post;
use App\Admin\Models\Product;
use App\Admin\Models\ShortUrl;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShortUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShortUrl::truncate();
        $product = Product::all();
        $post = Post::all();
        $categoryPost = PostCategory::all();
        $categoryProduct = ProductCategory::all();
        $page = Page::all();
        DB::beginTransaction();
        foreach ($product as $item) {
            $route = route('home') . '/' . $item->slug;
            ShortUrl::create([
                'url_key' => $item->slug,
                'type' => 1,
                'default_short_url' => $route,
            ]);
        }

        foreach ($post as $item) {
            $route = route('home') . '/' . $item->slug;
            ShortUrl::create([
                'url_key' => $item->slug,
                'type' => 2,
                'default_short_url' => $route,
            ]);
        }

        foreach ($categoryProduct as $item) {
            $route = route('home') . '/' . $item->slug;
            ShortUrl::create([
                'url_key' => $item->slug,
                'type' => 3,
                'default_short_url' => $route,
            ]);
        }

        foreach ($categoryPost as $item) {

            $route = route('home') . '/' . $item->slug;
            ShortUrl::create([
                'url_key' => $item->slug,
                'type' => 4,
                'default_short_url' => $route,
            ]);
        }

        foreach ($page as $item) {
            $route = route('home') . '/' . $item->slug;
            ShortUrl::create([
                'url_key' => $item->slug,
                'type' => 5,
                'default_short_url' => $route,
            ]);
        }
        DB::commit();
    }
}
