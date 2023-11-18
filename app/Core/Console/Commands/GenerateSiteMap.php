<?php

namespace App\Core\Console\Commands;

use App\Admin\Models\PostCategory;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\Page;
use App\Admin\Models\Product;
use App\Admin\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;

class GenerateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SitemapIndex::create()
            ->add('/sitemap_page.xml')
            ->add('/sitemap_category.xml')
            ->add('/sitemap_service.xml')
            ->add('/sitemap_topic.xml')
            ->add('/sitemap_post.xml')
            ->writeToFile(public_path('sitemap.xml'));

        // genarate sitemap page
        $page_urls = Page::select(DB::raw('CONCAT("page/", slug) as page_url'))->pluck('page_url');
        Sitemap::create()
            ->add($page_urls)
            ->writeToFile(public_path('sitemap_page.xml'));

        // genarate sitemap service category
        $category_urls = ProductCategory::select(DB::raw('CONCAT("danh-muc/", slug) as category_url'))->pluck('category_url');
        Sitemap::create()
            ->add($category_urls)
            ->writeToFile(public_path('sitemap_category.xml'));

        // genarate sitemap service
        $service_urls = Product::where('status', 1)->select(DB::raw('CONCAT("dich-vu/", slug) as service_url'))->pluck('service_url');
        Sitemap::create()
            ->add($service_urls)
            ->writeToFile(public_path('sitemap_service.xml'));

        // genarate sitemap post categories
        $post_cat_urls = PostCategory::select(DB::raw('CONCAT("chu-de/", slug) as topic'))->pluck('topic');
        Sitemap::create()
            ->add($post_cat_urls)
            ->writeToFile(public_path('sitemap_topic.xml'));

        // genarate sitemap post
        $post_urls = Post::where('status', 1)->select(DB::raw('CONCAT("tin-tuc/", slug) as post'))->pluck('post');
        Sitemap::create()
            ->add($post_urls)
            ->writeToFile(public_path('sitemap_post.xml'));

        return Command::SUCCESS;
    }
}
