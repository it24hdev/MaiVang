<?php

namespace Database\Seeders;

use App\Admin\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::truncate();
        Customer::factory(100)->create();
    }
}
