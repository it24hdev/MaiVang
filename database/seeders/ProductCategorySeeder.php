<?php

namespace Database\Seeders;

use App\Admin\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::truncate();
        ProductCategory::factory(100)->create();
    }
}
