<?php

namespace Database\Seeders;

use App\Admin\Models\ProductCategory;
use App\Admin\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::truncate();
        Tag::factory(100)->create();
    }
}
