<?php

namespace App\Web\Providers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
use App\Web\Services\Interfaces;
use App\Web\Services\Production;
class WebServiceProvider extends ServiceProvider
{
    protected $services = [
        Interfaces\NewsServiceInterface::class => Production\NewsService::class,
        Interfaces\PostServiceInterface::class => Production\PostService::class,
        Interfaces\ListPostServiceInterface::class => Production\ListPostService::class,
        Interfaces\ContactServiceInterface::class => Production\ContactService::class,
        Interfaces\HomeServiceInterface::class => Production\HomeService::class,
        Interfaces\ProductServiceInterface::class => Production\ProductService::class,
        Interfaces\RedirectServiceInterface::class => Production\RedirectService::class,
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
