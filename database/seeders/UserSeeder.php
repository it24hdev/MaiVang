<?php

namespace Database\Seeders;

use App\Admin\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::truncate();
         User::create(['name' => 'Admin','email' => 'admin@gmail.com','password' => Hash::make('123456'),'admin' => 1]);
         User::create(['name' => 'User','email' => 'user@gmail.com','password' => Hash::make('123456')]);
         User::create(['name' => 'Toàn','email' => 'toan@gmail.com','password' => Hash::make('123456'),'admin' => 1]);
    }
}
