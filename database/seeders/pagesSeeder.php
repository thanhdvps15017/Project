<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class pagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Trang chủ','Tin tức','Giới thiệu','Sản phẩm','Liên hệ'];
        $title = ['Chuỗi cửa hàng kinh doanh đồng hồ S - Watch', 'Tin tức - S - Watch','Giới thiệu - S - Watch','Sản phẩm - S - Watch','Liên hệ - S - Watch'];
        for($i = 0; $i < 5; $i++) {
            DB::table('pages')->insert([
                'name' => $name[$i],
                'title' => $title[$i],
                'description' => 'Mua online đồng hồ nam, nữ, trẻ em, cặp đôi chính hãng. Giá tốt nhất, có trả góp 0%. Giao nhanh chóng, xem hàng không mua không sao.',
                'keywords' => 'đồng hồ thời trang, đồng hồ đeo tay, đồng hồ nam, đồng hồ nữ, đồng hồ trẻ em, đồng hồ đôi, đồng hồ cặp',
                // 'template_id' => '1',
                'created_at' => now(),
            ]);
        }
    }
}
