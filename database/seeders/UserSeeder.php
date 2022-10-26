<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@demo.com', 'password' => Hash::make('admin@password'), 'role' => 'admin'],
            ['name' => 'User', 'login' => 'user@demo.com', 'password' => Hash::make('user@password'), 'role' => 'user']
        ]);
    }
}
