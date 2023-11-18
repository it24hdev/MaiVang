<?php

namespace App\Admin\Providers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
use App\Admin\Services\Interfaces;
use App\Admin\Services\Production;
class AdminServiceProvider extends ServiceProvider
{
    protected $services = [
        Interfaces\RoleServiceInterface::class => Production\RoleService::class,
        Interfaces\UserServiceInterface::class => Production\UserService::class,
        Interfaces\PostServiceInterface::class => Production\PostService::class,
        Interfaces\ProductServiceInterface::class => Production\ProductService::class,
        Interfaces\UnitServiceInterface::class => Production\UnitService::class,
        Interfaces\ProductCategoryServiceInterface::class => Production\ProductCategoryService::class,
        Interfaces\MenuServiceInterface::class => Production\MenuService::class,
        Interfaces\PageServiceInterface::class => Production\PageService::class,
        Interfaces\TagServiceInterface::class => Production\TagService::class,
        Interfaces\CustomerServiceInterface::class => Production\CustomerService::class,
        Interfaces\OrderServiceInterface::class => Production\OrderService::class,
        Interfaces\PostCategoryServiceInterface::class => Production\PostCategoryService::class,
        Interfaces\SliderServiceInterface::class => Production\SliderService::class,
        Interfaces\SystemServiceInterface::class => Production\SystemService::class,
        Interfaces\ShortUrlServiceInterface::class => Production\ShortUrlService::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->services as $interface => $item){
            $this->app->singleton($interface, $item);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Database\\Factories\\'.class_basename($modelName).'Factory';
        });
    }

}
