<?php

namespace Database\Seeders;

use App\Admin\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();
        Product::factory(100)->create();
    }
}
