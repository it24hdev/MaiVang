<?php

namespace Database\Seeders;

use App\Admin\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::truncate();
        Position::create(['name' => 'Đầu trang','code' => 'menu_header','type' => 'menu','object_id' => 0]);
        Position::create(['name' => 'Cuối trang (Cột 1)','code' => 'menu_footer_col_1','type' => 'menu','object_id' => 0]);
        Position::create(['name' => 'Cuối trang (Cột 2)','code' => 'menu_footer_col_2','type' => 'menu','object_id' => 0]);
        Position::create(['name' => 'Cuối trang (Cột 3)','code' => 'menu_footer_col_3','type' => 'menu','object_id' => 0]);
        Position::create(['name' => 'Cuối trang (Cột 4)','code' => 'menu_footer_col_4','type' => 'menu','object_id' => 0]);
        Position::create(['name' => 'Banner trang chủ','code' => 'banner','type' => 'slider','object_id' => 0]);
    }
}
