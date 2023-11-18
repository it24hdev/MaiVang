<?php

namespace App\Admin\Providers;

use App\Admin\Models\Attribute;
use App\Admin\Models\Branch;
use App\Admin\Models\Brand;
use App\Admin\Models\PostCategory;
use App\Admin\Models\ProductCategory;
use App\Admin\Models\Collection;
use App\Admin\Models\Customer;
use App\Admin\Models\FileManagers;
use App\Admin\Models\GroupProduct;
use App\Admin\Models\Menu;
use App\Admin\Models\Order;
use App\Admin\Models\Page;
use App\Admin\Models\Post;
use App\Admin\Models\PaymentMethod;
use App\Admin\Models\Product;
use App\Admin\Models\Role;
use App\Admin\Models\ShippingMethod;
use App\Admin\Models\ShortUrl;
use App\Admin\Models\System;
use App\Admin\Models\Tag;
use App\Admin\Models\Tax;
use App\Admin\Models\Template;
use App\Admin\Models\TemplateDetail;
use App\Admin\Models\TransportFee;
use App\Admin\Models\Unit;
use App\Admin\Models\Warehouse;
use App\Admin\Policies\AttributePolicies;
use App\Admin\Policies\BranchPolicies;
use App\Admin\Policies\BrandPolicies;
use App\Admin\Policies\PostCategoryPolicies;
use App\Admin\Policies\ProductCategoryPolicies;
use App\Admin\Policies\CollectionPolicies;
use App\Admin\Policies\CustomerPolicies;
use App\Admin\Policies\FileManagerPolicies;
use App\Admin\Policies\GroupProductPolicies;
use App\Admin\Policies\MenuPolicies;
use App\Admin\Policies\OrderPolicies;
use App\Admin\Policies\PagePolicies;
use App\Admin\Policies\PostPolicies;
use App\Admin\Policies\PaymentMethodPolicies;
use App\Admin\Policies\ProductPolicies;
use App\Admin\Policies\ShippingMethodPolicies;
use App\Admin\Policies\ShortUrlPolicies;
use App\Admin\Policies\TagPolicies;
use App\Admin\Policies\TaxPolicies;
use App\Admin\Policies\TemplateDetailPolicies;
use App\Admin\Policies\RolePolicies;
use App\Admin\Policies\SystemPolicies;
use App\Admin\Policies\TemplatePolicies;
use App\Admin\Policies\TransportFeePolicies;
use App\Admin\Policies\UnitPolicies;
use App\Admin\Policies\UserPolicies;
use App\Admin\Models\User;
use App\Admin\Policies\WareHousePolicies;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicies::class,
        Role::class => RolePolicies::class,
        System::class => SystemPolicies::class,
        Product::class => ProductPolicies::class,
        Post::class => PostPolicies::class,
        ProductCategory::class => ProductCategoryPolicies::class,
        Menu::class => MenuPolicies::class,
        Page::class => PagePolicies::class,
        Tag::class => TagPolicies::class,
        Customer::class => CustomerPolicies::class,
        Order::class => OrderPolicies::class,
        PostCategory::class => PostCategoryPolicies::class,
        ShortUrl::class => ShortUrlPolicies::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
