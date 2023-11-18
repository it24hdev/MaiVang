<?php

namespace App\Web\Services\Production;

use App\Admin\Models\ShortUrl;
use App\Web\Http\Controllers\ListPostController;
use App\Web\Http\Controllers\PostController;
use App\Web\Http\Controllers\ProductController;
use App\Web\Services\Interfaces\ListPostServiceInterface;
use App\Web\Services\Interfaces\PostServiceInterface;
use App\Web\Services\Interfaces\ProductServiceInterface;
use App\Web\Services\Interfaces\RedirectServiceInterface;

class RedirectService extends BaseService implements RedirectServiceInterface
{
    public function index($request)
    {
        $short_url = ShortUrl::where('url_key', $request->slug)->first();

        if ($short_url) {
            if ($short_url->redirect_url != "") {
                if ($short_url->deactivated_at > now() || empty($short_url->deactivated_at)) {
                    return redirect($short_url->redirect_url);
                } else {
                    return abort(404);
                }
            } else {

                if ($short_url->activated_at < now() && ($short_url->deactivated_at > now() || empty($short_url->deactivated_at))) {
                    if ($short_url->type == 1) {
                        $productController = new ProductController(app(ProductServiceInterface::class));
                        return $productController->detailProduct($request);
                    }

                    if ($short_url->type == 2) {
                        $postController = new PostController(app(PostServiceInterface::class));
                        return $postController->index($request);
                    }

                    if ($short_url->type == 3) {
                        $categoryProductController = new ProductController(app(ProductServiceInterface::class));
                        return $categoryProductController->categoryProduct($request);
                    }

                    if ($short_url->type == 4) {
                        $categoryPostController = new ListPostController(app(ListPostServiceInterface::class));
                        return $categoryPostController->index($request);
                    }

                    if ($short_url->type == 5) {
                        return abort(404);
                    }
                }
            }
        }

        return abort(404);
    }
}
