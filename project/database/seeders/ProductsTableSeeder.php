<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Máy tính Dell',
            'price' => '14999000',
            'detail' => 'Máy tính được tích hợp công nghệ gập màn hình và giả lập',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Tủ lạnh',
            'price' => '48900000',
            'detail' => 'Đây là tủ lạnh với hai cửa trên và dưới',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Tivi LG',
            'price' => '51999000',
            'detail' => 'Đây là ti vi LG được tích hợp đa tính năng',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
