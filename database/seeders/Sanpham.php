<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Arr;
class Sanpham extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $day = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28];
        $month = [1,2,3,4,5,6,7,8,9,10];
        $cat = [1,2,3,4];
        $brands = [1,2];
        for ($i = 0; $i<100; $i++){

            DB::table('products')->insert([
                'brand_id' => Arr::random($brands),
                'pr_category_id' => Arr::random($cat),
                'name' => 'Sản phẩm demo '.$i,
                'slug' => 'san-pham-demo-'.$i,
                'images' => 'images/product-'.$i,
                'description' => 'Với đầy đủ các đặc trưng của đồng hồ Casio truyền thống, Edifice Casio còn được tích hợp nhiều chức năng hiện đại, giá trị ứng dụng cao, mang đến cho phái mạnh dòng sản phẩm thông minh đáng mơ ước.',
                'contents' => '• Thiết kế thanh lịch, sang trọng pha một chút cá tính của mẫu Đồng hồ EDIFICE 47.1 mm Nam EFR-573HG-1AVUDF này đến từ hãng đồng hồ Casio thuộc dòng Edifice Casio, một trong những thương hiệu nổi tiếng toàn cầu.

• Đồng hồ sở hữu đường kính mặt 46 mm kết hợp chất liệu kính khoáng ở mặt kính có độ trong suốt cao, độ cứng khá, hạn chế nứt vỡ khi bị va đập vừa phải.

• Khung viền và dây đeo của đồng hồ được chế tạo từ thép không gỉ cứng cáp, bền bỉ và có khả năng chống chịu mọi thời tiết, chống oxi hoá. Dây đeo mang lại cảm giác mát tay, ôm khít và vừa vặn khi đeo.

• An tâm tuyệt đối khi mang đồng hồ Edifice Casio đi bơi lội bởi thông số chống nước 10 ATM tuyệt vời. Lưu ý: Không đeo khi lặn và không được điều chỉnh nút điều khiển khi đang bơi dưới nước.

• Tích hợp tính năng đa dạng như lịch ngày, đồng hồ 24 giờ, bấm giờ thể thao hỗ trợ bạn tối đa trong công việc lẫn cuộc sống hằng ngày.',
                'price' => rand(1000000, 10000000),
                'discount' => rand(5, 15),
                'sku' => '0',
            ]);
        }
    }
}
