<?php

namespace Database\Seeders;

use App\Admin\Models\Product;
use App\Admin\Models\ProductCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
//            CustomerSeeder::class,
            DistrictSeeder::class,
//            OrderSeeder::class,
            PermissionsSeeder::class,
            PositionSeeder::class,
//            PostSeeder::class,
//            ProductCategorySeeder::class,
//            ProductSeeder::class,
//            ShortUrlSeeder::class,
            SystemSeeder::class,
//            TagSeeder::class,
            UserSeeder::class,
        ]);
    }
}
