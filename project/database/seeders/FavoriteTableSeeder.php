<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FavoriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('favorities')->insert([
            'favorite_name' => "Bóng đá",
            'favorite_description' => "Đây là một bộ môn thể theo sử dụng linh hoạt tất cả các bộ phận trên cơ thể ngoại trừ tay"
        ]);
        DB::table('favorities')->insert([
            'favorite_name' => "Bóng chuyền",
            'favorite_description' => "Đây là một bộ môn thể theo sử dụng tay để chuyền bóng"
        ]);
    }
}
