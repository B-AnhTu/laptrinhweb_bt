<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo dữ liệu mẫu cho bảng orders
        DB::table('orders')->insert([
            'user_id' => 1, // Thay thế 1 bằng ID của user trong bảng users nếu bạn có dữ liệu người dùng
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('orders')->insert([
            'user_id' => 2, // Thay thế 1 bằng ID của user trong bảng users nếu bạn có dữ liệu người dùng
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
