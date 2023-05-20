<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Arr;

class productDetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $brands = [1,2];
        DB::table('product_details')->insert([
            'product_id' => rand(1,10),//thời gian  bảo  hành
            'color' => Arr::random(10),//màu mặt  số
            'size' => Arr::random(10),//kick  thước  giây
            'sex' => Arr::random(2),//giới tính
            'glass_type' => Arr::random(10),//loại giây
            'brand' => Arr::random($brands),//hãng
            'catagory' => 'chưa có',//thương hiệu

            ]);
    }
}
