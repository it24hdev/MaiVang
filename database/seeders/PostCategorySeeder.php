<?php

namespace Database\Seeders;

use App\Admin\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostCategory::factory(2)->create();
    }
}
