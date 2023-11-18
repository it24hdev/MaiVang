<?php

use Illuminate\Support\Facades\Route;
use App\Web\Http\Controllers\NewsController;
use App\Web\Http\Controllers\ContactController;
use App\Web\Http\Controllers\HomeController;
use App\Web\Http\Controllers\ProductController;
use App\Web\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('optimize:clear');
    Artisan::call('event:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('view:cache');
    return "Cleared!";
});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/search-perfect',[HomeController::class,'searchPerfect'])->name('search_perfect');
Route::post('/email-order',[HomeController::class,'emailOrder'])->name('email_order');
Route::get('/tin-tuc',[NewsController::class,'index'])->name('news');
Route::get('/lien-he',[ContactController::class,'index'])->name('contact');
Route::post('/booking',[ContactController::class,'booking'])->name('booking');
Route::get('/san-pham',[ProductController::class,'categoryProduct'])->name('list_product');
Route::get('/load-products',[ProductController::class,'loadProducts'])->name('load_products');
Route::post('/load-product-by-category',[HomeController::class,'loadProductByCategory'])->name('load_product_by_category');
Route::post('/get-solution',[HomeController::class,'getSolution'])->name('get_solution');
Route::post('/get-category-product',[HomeController::class,'getCategoryProduct'])->name('get_category_product');
Route::post('/get-product-all',[HomeController::class,'getProductAll'])->name('get_product_all');
Route::post('/get-customer',[HomeController::class,'getCustomer'])->name('get_customer');
Route::post('/get-video',[HomeController::class,'getVideo'])->name('get_video');
Route::post('/get-news',[HomeController::class,'getNews'])->name('get_news');
Route::post('/get-category-image',[HomeController::class,'getCategoryImage'])->name('get_category_image');
Route::post('/contact-order',[HomeController::class,'contactOrder'])->name('contact_order');
Route::post('/phone-order',[HomeController::class,'phoneOrder'])->name('phone_order');
Route::get('/{slug}',[RedirectController::class,'index'])->name('redirect');
