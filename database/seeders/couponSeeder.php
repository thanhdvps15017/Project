<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Str;
use Arr;

class couponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 50; $i++){
            DB::table('coupon')->insert([
                'coupon_code' => 'SW'.rand(000000, 999999),
                'coupon_type' => 0,
                'description' => '',
                'discount' => 10,
                'min_total' => 500000,
                'max_discount' => 100000,
                'date_start' => now(),
                'date_expire' => '2023-04-30 23:59:59',
                'quantity' => 10,
                'remaining' => rand(0,10),
                'created_at' => now(),
            ]);
        }
    }
}
