<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '0928313132',
            'image' => 'demouser.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Mary Jane',
            'email' => 'maryjane@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '0827312312',
            'image' => 'demouser.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
