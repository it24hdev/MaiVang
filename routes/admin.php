<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Http\Controllers\RoleController;
use App\Admin\Http\Controllers\UserController;
use App\Admin\Http\Controllers\AuthController;
use App\Admin\Http\Controllers\DashboardController;
use App\Admin\Http\Controllers\PostController;
use App\Admin\Http\Controllers\ProductController;
use App\Admin\Http\Controllers\UnitController;
use App\Admin\Http\Controllers\MenuController;
use App\Admin\Http\Controllers\PageController;
use App\Admin\Http\Controllers\TagController;
use App\Admin\Http\Controllers\CustomerController;
use App\Admin\Http\Controllers\OrderController;
use App\Admin\Http\Controllers\SliderController;
use App\Admin\Http\Controllers\SystemController;
use App\Admin\Http\Controllers\ShortUrlController;
use App\Admin\Http\Controllers\ProductCategoryController;
use App\Admin\Http\Controllers\PostCategoryController;
use UniSharp\LaravelFilemanager\Lfm;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/login-authentication', [AuthController::class, 'loginAuthentication'])->name('admin.login_authentication');
Route::get('/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('/register-authentication', [AuthController::class, 'registerAuthentication'])->name('admin.register_authentication');
Route::get('/sign-out', [AuthController::class, 'signOut'])->name('admin.sign_out');
Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('admin.forget_password');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('admin.change_password');
Route::post('/update-password', [AuthController::class, 'update'])->name('admin.update_password');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin');

    /**
     * File manager Module
     * toanbv
     */
    Route::prefix('/file-manager')->group(function () {
        Lfm::routes();
    });

    /**
     * decentralization Module
     * toanbv
     * */
    Route::prefix('/roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::post('/destroy', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
        Route::post('/destroys', [RoleController::class, 'destroys'])->name('admin.roles.destroys');
        Route::post('/restore', [RoleController::class, 'restore'])->name('admin.roles.restore');
        Route::get('/create', [RoleController::class, 'create'])->name('admin.roles.create');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.roles.store');
        Route::get('/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
        Route::post('/update', [RoleController::class, 'update'])->name('admin.roles.update');
        Route::post('/show', [RoleController::class, 'show'])->name('admin.roles.show');
    });

    /**
     * Users Module
     * toanbv
     * */
    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::post('/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::post('/destroys', [UserController::class, 'destroys'])->name('admin.users.destroys');
        Route::post('/restore', [UserController::class, 'restore'])->name('admin.users.restore');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update', [UserController::class, 'update'])->name('admin.users.update');
    });

    /**
     * Products Module
     * toanbv
     * */
    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::get('/edit-category', [ProductController::class, 'editCategory'])->name('admin.product.edit_category');
        Route::get('/edit-image', [ProductController::class, 'editImage'])->name('admin.product.edit_image');
        Route::get('/edit-attribute', [ProductController::class, 'editAttribute'])->name('admin.product.edit_attribute');
        Route::get('/edit-tag', [ProductController::class, 'editTag'])->name('admin.product.edit_tag');
        Route::get('/edit-variant', [ProductController::class, 'editVariant'])->name('admin.product.edit_variant');
        Route::get('/edit-detail', [ProductController::class, 'editDetail'])->name('admin.product.edit_detail');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::post('/update', [ProductController::class, 'update'])->name('admin.product.update');
        Route::post('/restore', [ProductController::class, 'restore'])->name('admin.product.restore');
        Route::post('/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        Route::post('/change-status', [ProductController::class, 'changeStatus'])->name('admin.product.change_status');
        Route::post('/change-show', [ProductController::class, 'changeShow'])->name('admin.product.change_show');
        Route::post('/show', [ProductController::class, 'show'])->name('admin.product.show');
        Route::post('/load-Category', [ProductController::class, 'loadCategory'])->name('admin.category_product.loadCategory');
        Route::post('/update-category', [ProductController::class, 'updateCategory'])->name('admin.category_product.updateCategory');
        Route::post('/load-image', [ProductController::class, 'loadImage'])->name('admin.product.load_image');
        Route::post('/upload-image', [ProductController::class, 'uploadImage'])->name('admin.product.upload_image');
        Route::post('/delete-image', [ProductController::class, 'deleteImage'])->name('admin.product.delete_image');
        Route::post('/update-image', [ProductController::class, 'updateImage'])->name('admin.product.update_image');
        Route::post('/load-album', [ProductController::class, 'loadAlbum'])->name('admin.product.load_album');
        Route::post('/upload-from-album', [ProductController::class, 'uploadFromAlbum'])->name('admin.product.upload_from_album');
        Route::post('/update-attribute', [ProductController::class, 'updateAttribute'])->name('admin.product.update_attribute');
        Route::post('/update-detail', [ProductController::class, 'updateDetail'])->name('admin.product.update_detail');
        Route::post('/update-tag', [ProductController::class, 'updateTag'])->name('admin.product.update_tag');
        Route::post('/load-variant', [ProductController::class, 'loadVariant'])->name('admin.product.load_variant');
        Route::post('/update-variant', [ProductController::class, 'updateVariant'])->name('admin.product.update_variant');
        Route::post('/destroy-variant', [ProductController::class, 'destroyVariant'])->name('admin.product.destroy_variant');
        Route::get('/export', [ProductController::class, 'export'])->name('admin.product.export');
        Route::post('/import', [ProductController::class, 'import'])->name('admin.product.import');
        Route::get('/process-data', [ProductController::class, 'ProductImageImport'])->name('admin.product.product_image');
    });

    /**
     * Units Module
     * toanbv
     * */
    Route::prefix('/unit')->group(function () {
        Route::get('/', [UnitController::class, 'index'])->name('admin.units.index');
        Route::post('/load', [UnitController::class, 'load'])->name('admin.units.load');
        Route::post('/store', [UnitController::class, 'store'])->name('admin.units.store');
        Route::post('/destroy', [UnitController::class, 'destroy'])->name('admin.units.destroy');
        Route::post('/edit', [UnitController::class, 'edit'])->name('admin.units.edit');
        Route::post('/update', [UnitController::class, 'update'])->name('admin.units.update');
    });

    /**
     * Category Product Module
     * toanbv
     */
    Route::prefix('/category-products')->group(function () {
        Route::get('/', [ProductCategoryController::class, 'index'])->name('admin.category_products.index');
        Route::get('/create', [ProductCategoryController::class, 'create'])->name('admin.category_products.create');
        Route::post('/load', [ProductCategoryController::class, 'load'])->name('admin.category_products.load');
        Route::post('/load-attribute', [ProductCategoryController::class, 'loadAttribute'])->name('admin.category_products.load_attribute');
        Route::post('/store', [ProductCategoryController::class, 'store'])->name('admin.category_products.store');
        Route::post('/destroy', [ProductCategoryController::class, 'destroy'])->name('admin.category_products.destroy');
        Route::post('/destroy-attribute', [ProductCategoryController::class, 'destroyAttribute'])->name('admin.category_products.destroy_attribute');
        Route::post('/edit', [ProductCategoryController::class, 'edit'])->name('admin.category_products.edit');
        Route::post('/update', [ProductCategoryController::class, 'update'])->name('admin.category_products.update');
        Route::post('/update-location', [ProductCategoryController::class, 'updateLocation'])->name('admin.category_products.update_location');
        Route::get('/add-attribute', [ProductCategoryController::class, 'addAttribute'])->name('admin.category_products.add_attribute');
        Route::post('/load-add-attribute', [ProductCategoryController::class, 'loadAddAttribute'])->name('admin.category_products.load_add_attribute');
        Route::post('/adding-attribute', [ProductCategoryController::class, 'addingAttribute'])->name('admin.category_products.adding_attribute');
    });

    /** Menu Module
     * toanbv
     */
    Route::prefix('/menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('admin.menu_managers.index');
        Route::post('/update', [MenuController::class, 'update'])->name('admin.menu_managers.update');
        Route::post('/store-item', [MenuController::class, 'storeItem'])->name('admin.menu_managers.store_item');
        Route::post('/store-menu', [MenuController::class, 'storeMenu'])->name('admin.menu_managers.store_menu');
        Route::post('/destroy-menu', [MenuController::class, 'destroyMenu'])->name('admin.menu_managers.destroy_menu');
        Route::post('/position', [MenuController::class, 'position'])->name('admin.menu_manager.position');
    });

    /** Page Module
     * toanbv
     */
    Route::prefix('/pages')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('admin.pages.index');
        Route::post('/load', [PageController::class, 'load'])->name('admin.pages.load');
        Route::post('/store', [PageController::class, 'store'])->name('admin.pages.store');
        Route::post('/destroy', [PageController::class, 'destroy'])->name('admin.pages.destroy');
        Route::post('/edit', [PageController::class, 'edit'])->name('admin.pages.edit');
        Route::post('/update', [PageController::class, 'update'])->name('admin.pages.update');
    });

    /**
     * Tag Module
     * toanbv
     * */
    Route::prefix('/tag')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('admin.tags.index');
        Route::post('/load', [TagController::class, 'load'])->name('admin.tags.load');
        Route::post('/store', [TagController::class, 'store'])->name('admin.tags.store');
        Route::post('/destroy', [TagController::class, 'destroy'])->name('admin.tags.destroy');
        Route::post('/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
        Route::post('/update', [TagController::class, 'update'])->name('admin.tags.update');
    });


    /**
     * Customer Module
     * toanbv
     * */
    Route::prefix('/customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('admin.customers.index');
        Route::post('/store', [CustomerController::class, 'store'])->name('admin.customers.store');
        Route::post('/destroy', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
        Route::post('/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
        Route::post('/update', [CustomerController::class, 'update'])->name('admin.customers.update');
        Route::post('/load-district', [CustomerController::class, 'loadDistrict'])->name('admin.customers.load_district');
    });

    /**
     * Order Module
     * toanbv
     * */
    Route::prefix('/order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/create', [OrderController::class, 'create'])->name('admin.orders.create');
        Route::post('/store', [OrderController::class, 'store'])->name('admin.orders.store');
        Route::get('/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
        Route::post('/update', [OrderController::class, 'update'])->name('admin.orders.update');
        Route::post('/load-product', [OrderController::class, 'loadProduct'])->name('admin.orders.load_product');
        Route::post('/view', [OrderController::class, 'view'])->name('admin.orders.view');
        Route::post('/destroy', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
        Route::post('/load-district', [OrderController::class, 'loadDistrict'])->name('admin.orders.load_district');
        Route::get('/redirect-created', [OrderController::class, 'redirectCreated'])->name('admin.orders.redirect_created');
        Route::get('/redirect-updated', [OrderController::class, 'redirectUpdated'])->name('admin.orders.redirect_updated');
    });

    /**
     * Posts Module
     * toanbv
     * */
    Route::prefix('/posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
        Route::post('/store', [PostController::class, 'store'])->name('admin.posts.store');
        Route::post('/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
        Route::post('/update', [PostController::class, 'update'])->name('admin.posts.update');
        Route::post('/destroy', [PostController::class, 'destroy'])->name('admin.posts.destroy');
        Route::post('/restore', [PostController::class, 'restore'])->name('admin.posts.restore');
        Route::get('/resizeImagesInDirectory', [PostController::class, 'resizeImagesInDirectory']);
    });

    /**
     * Category Post Module
     * toanbv
     * */
    Route::prefix('/category-posts')->group(function () {
        Route::get('/', [PostCategoryController::class, 'index'])->name('admin.category_posts.index');
        Route::post('/load', [PostCategoryController::class, 'load'])->name('admin.category_posts.load');
        Route::post('/update-location', [PostCategoryController::class, 'updateLocation'])->name('admin.category_posts.update_location');
        Route::post('/store', [PostCategoryController::class, 'store'])->name('admin.category_posts.store');
        Route::post('/edit', [PostCategoryController::class, 'edit'])->name('admin.category_posts.edit');
        Route::post('/update', [PostCategoryController::class, 'update'])->name('admin.category_posts.update');
        Route::post('/destroy', [PostCategoryController::class, 'destroy'])->name('admin.category_posts.destroy');
    });

    /**
     * Slider Module
     * toanbv
     * */
    Route::prefix('/sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('admin.sliders.index');
        Route::post('/load', [SliderController::class, 'load'])->name('admin.sliders.load');
        Route::post('/store', [SliderController::class, 'store'])->name('admin.sliders.store');
        Route::post('/edit', [SliderController::class, 'edit'])->name('admin.sliders.edit');
        Route::post('/update', [SliderController::class, 'update'])->name('admin.sliders.update');
        Route::post('/destroy', [SliderController::class, 'destroy'])->name('admin.sliders.destroy');
    });

    /**
     * System Module
     * toanbv
     * */
    Route::prefix('/system')->group(function () {
        Route::get('/', [SystemController::class, 'index'])->name('admin.system.index');
        Route::post('/update-product-image-size', [SystemController::class, 'updateProductImageSize'])->name('admin.system.product_image_size');
        Route::post('/update-post-image-size', [SystemController::class, 'updatePostImageSize'])->name('admin.system.post_image_size');
    });

    /**
     * Short url Module
     * toanbv
     * */
    Route::prefix('/short-url')->group(function () {
        Route::get('/', [ShortUrlController::class, 'index'])->name('admin.short_url.index');
        Route::get('/edit', [ShortUrlController::class, 'edit'])->name('admin.short_url.edit');
        Route::get('/create', [ShortUrlController::class, 'create'])->name('admin.short_url.create');
        Route::post('/store', [ShortUrlController::class, 'store'])->name('admin.short_url.store');
        Route::post('/destroy', [ShortUrlController::class, 'destroy'])->name('admin.short_url.destroy');
        Route::post('/update', [ShortUrlController::class, 'update'])->name('admin.short_url.update');
    });

});
