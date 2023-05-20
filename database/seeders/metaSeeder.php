<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Arr;
use Str;

class metaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_meta')->insert(
            [
//                Trang liên hệ
                [
                    'page_id' => '5',
                    'meta_key' => 'banner_image',
                    'meta_label' => 'Chọn ảnh banner',
                    'meta_type' => 'image',
                    'meta_value' => json_encode([
                        'url' => 'images/banner/banner_1.jpg',
                        'alt' => 'Demo alt',
                    ]),
                ],
                [
                    'page_id' => '5',
                    'meta_key' => 'map_iframe',
                    'meta_label' => 'Nhập link google map',
                    'meta_type' => 'text',
                    'meta_value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1142.747860532402!2d106.62735183129713!3d10.852960517212846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b161f50ae47%3A0x2328d1d1acc3b11a!2sFPT%20Polytechnic%20-%20T%C3%B2a%20F!5e0!3m2!1svi!2s!4v1678504320294!5m2!1svi!2s',
                ],
                [
                    'page_id' => '5',
                    'meta_key' => 'form_title',
                    'meta_label' => 'Nhập tiêu đề form liên hệ',
                    'meta_type' => 'text',
                    'meta_value' => 'Liên hệ chúng tôi',
                ],
                [
                    'page_id' => '5',
                    'meta_key' => 'form_des',
                    'meta_label' => 'Nhập mô tả form liên hệ',
                    'meta_type' => 'text',
                    'meta_value' => 'Quý khách có nhu cầu liên hệ nhận tư vấn sản phẩm hoặc hợp tác xin vui lòng điền vào form bên dưới hoặc liên hệ trực tiếp đến số 0928.799.xxx',
                ],
                [
                    'page_id' => '5',
                    'meta_key' => 'social_icon',
                    'meta_label' => 'Nhập icon mạng xã hội',
                    'meta_type' => 'repeater',
                    'meta_value' => json_encode([
                        [
                            [
                                'child_key' => 'icon',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/facebook.png',
                                    'alt' => '',
                                ],
                            ],
                            [
                                'child_key' => 'link',
                                'child_type' => 'link',
                                'child_label' => 'Nhập link',
                                'child_value' => [
                                    'title' => 'Facebook',
                                    'url' => 'https://www.facebook.com/',
                                    'target' => '_blank',
                                ]
                            ]
                        ],
                        [
                            [
                                'child_key' => 'icon',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/instagram.png',
                                    'alt' => '',
                                ],
                            ],
                            [
                                'child_key' => 'link',
                                'child_type' => 'link',
                                'child_label' => 'Nhập link',
                                'child_value' => [
                                    'title' => 'Instagram',
                                    'url' => 'https://www.instagram.com/',
                                    'target' => '_blank',
                                ]
                            ]
                        ],
                        [
                            [
                                'child_key' => 'icon',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/email.png',
                                    'alt' => '',
                                ],
                            ],
                            [
                                'child_key' => 'link',
                                'child_type' => 'link',
                                'child_label' => 'Nhập link',
                                'child_value' => [
                                    'title' => 'Email',
                                    'url' => 'mailto:contact.beeswatch@gmail.com',
                                    'target' => '_blank',
                                ]
                            ]
                        ]
                    ]),
                ],
                [
                    'page_id' => '5',
                    'meta_key' => 'img_contact',
                    'meta_label' => 'Chọn ảnh',
                    'meta_type' => 'image',
                    'meta_value' => json_encode([
                        'url' => 'images/contact.jpg',
                        'alt' => 'Liên hệ S - Watch',
                    ]),
                ],
//                Trang tin tức
                [
                    'page_id' => '2',
                    'meta_key' => 'banner_image',
                    'meta_label' => 'Chọn ảnh banner',
                    'meta_type' => 'image',
                    'meta_value' => json_encode([
                        'url' => 'images/banner/banner_1.jpg',
                        'alt' => 'Demo alt',
                    ]),
                ],
                [
                    'page_id' => '2',
                    'meta_key' => 'link_fanpage',
                    'meta_label' => 'Nhập link fanpage',
                    'meta_type' => 'text',
                    'meta_value' => 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fbusiness.facebook.com%2Ftnkhoiweb&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=532133051086417',
                ],
                [
                    'page_id' => '2',
                    'meta_key' => 'choose_news_cat',
                    'meta_label' => 'Chọn danh mục tin tức',
                    'meta_type' => 'news_cat',
                    'meta_value' => json_encode([1,2,3,4,5])
                ],
                [
                    'page_id' => '2',
                    'meta_key' => 'choose_hot_posts',
                    'meta_label' => 'Chọn tin tức xem nhiều (Lấy tự động theo lượt xem nếu không chọn)',
                    'meta_type' => 'posts',
                    'meta_value' => json_encode([1,2,3,4,5])
                ],
                [
                    'page_id' => '2',
                    'meta_key' => 'news_page_title',
                    'meta_label' => 'Nhập tiêu đề',
                    'meta_type' => 'text',
                    'meta_value' => 'Tin tức'
                ],
                [
                    'page_id' => '2',
                    'meta_key' => 'news_page_des',
                    'meta_label' => 'Nhập mô tả',
                    'meta_type' => 'text',
                    'meta_value' => 'Cập nhật tin tức mới nhất từ chúng tôi!'
                ],
//                Trang sản phẩm
                [
                    'page_id' => '4',
                    'meta_key' => 'banner_image',
                    'meta_label' => 'Chọn ảnh banner',
                    'meta_type' => 'image',
                    'meta_value' => json_encode([
                        'url' => 'images/banner/banner_1.jpg',
                        'alt' => 'Demo alt',
                    ]),
                ],
                [
                    'page_id' => '4',
                    'meta_key' => 'choose_pd_cat',
                    'meta_label' => 'Chọn danh mục sản phẩm',
                    'meta_type' => 'pd_cat',
                    'meta_value' => json_encode([1,2,3,4,5])
                ],
                [
                    'page_id' => '4',
                    'meta_key' => 'choose_brand',
                    'meta_label' => 'Chọn thương hiệu',
                    'meta_type' => 'brands',
                    'meta_value' => json_encode([1,2,3,4,5])
                ],
//                Trang chủ
//          Banner
                [
                    'page_id' => '1',
                    'meta_key' => 'banner_image',
                    'meta_label' => 'Chọn hình ảnh banner',
                    'meta_type' => 'gallery',
                    'meta_value' => json_encode([
                        [
                            'url' => 'images/banner/home_banner_2.jpg',
                            'alt' => 'Banner trang chủ'
                        ],
                        [
                            'url' => 'images/banner/home_banner.webp',
                            'alt' => 'Banner trang chủ'
                        ],
                        [
                            'url' => 'images/banner/home_banner_3.webp',
                            'alt' => 'Banner trang chủ'
                        ]
                    ])
                ],
//          Section 1
                [
                    'page_id' => '1',
                    'meta_key' => 'title_sec_1',
                    'meta_label' => 'Tiêu đề section 1',
                    'meta_type' => 'text',
                    'meta_value' => 'Sản phẩm'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'des_sec_1',
                    'meta_label' => 'Mô tả section 1',
                    'meta_type' => 'text',
                    'meta_value' => 'Các dòng sản phẩm bán chạy tại S - Watch'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'bg_title_sec_1',
                    'meta_label' => 'Tiêu đề ẩn section 1',
                    'meta_type' => 'text',
                    'meta_value' => 'PRODUCTS'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'choose_pd_sec_1',
                    'meta_label' => 'Chọn sản phẩm section 1',
                    'meta_type' => 'products',
                    'meta_value' => json_encode([1,2,3,4,5,6,7,8,9])
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'bg_img_sec_1',
                    'meta_label' => 'Ảnh nền section 1',
                    'meta_type' => 'image',
                    'meta_value' => json_encode([
                        'url' => 'images/background/Rectangle-695.png',
                        'alt' => '',
                    ])
                ],
//          Section 2
                [
                    'page_id' => '1',
                    'meta_key' => 'title_sec_2',
                    'meta_label' => 'Tiêu đề section 2',
                    'meta_type' => 'text',
                    'meta_value' => 'TẠI SAO CHỌN CHÚNG TÔI'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'des_sec_2',
                    'meta_label' => 'Mô tả section 2',
                    'meta_type' => 'text',
                    'meta_value' => 'Với nhiều năm kinh nghiệm chúng tôi tự tin rằng về dịch vụ cũng như sản phẩm của mình'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'bg_title_sec_2',
                    'meta_label' => 'Tiêu đề ẩn section 2',
                    'meta_type' => 'text',
                    'meta_value' => 'WHY TO CHOOSE'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'content_sec_2',
                    'meta_label' => 'Nội dung section 2',
                    'meta_type' => 'repeater',
                    'meta_value' => json_encode([
                        [
                            [
                                'child_key' => 'title',
                                'child_type' => 'text',
                                'child_label' => 'Nhập tiêu đề',
                                'child_value' => 'TIỆN LỢI',
                            ],
                            [
                                'child_key' => 'content',
                                'child_type' => 'text',
                                'child_label' => 'Nhập nội dung',
                                'child_value' => 'Giao diện đơn giản, thân thiện và thông minh. Nhân viên chỉ mất 15 phút làm quen để bán hàng.',
                            ],
                            [
                                'child_key' => 'content',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/icon_home_1.png',
                                    'alt' => 'S - Watch'
                                ],
                            ],
                        ],
                        [
                            [
                                'child_key' => 'title',
                                'child_type' => 'text',
                                'child_label' => 'Nhập tiêu đề',
                                'child_value' => 'ĐỘI NGŨ NHÂN VIÊN',
                            ],
                            [
                                'child_key' => 'content',
                                'child_type' => 'text',
                                'child_label' => 'Nhập nội dung',
                                'child_value' => 'Giao diện đơn giản, thân thiện và thông minh. Nhân viên chỉ mất 15 phút làm quen để bán hàng.',
                            ],
                            [
                                'child_key' => 'content',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/icon_home_2.png',
                                    'alt' => 'S - Watch'
                                ],
                            ],
                        ],
                        [
                            [
                                'child_key' => 'title',
                                'child_type' => 'text',
                                'child_label' => 'Nhập tiêu đề',
                                'child_value' => 'SẢN PHẨM MỚI NHẤT',
                            ],
                            [
                                'child_key' => 'content',
                                'child_type' => 'text',
                                'child_label' => 'Nhập nội dung',
                                'child_value' => 'Giao diện đơn giản, thân thiện và thông minh. Nhân viên chỉ mất 15 phút làm quen để bán hàng.',
                            ],
                            [
                                'child_key' => 'content',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/icon_home_3.png',
                                    'alt' => 'S - Watch'
                                ],
                            ],
                        ],
                    ])
                ],
//          Section 3
                [
                    'page_id' => '1',
                    'meta_key' => 'title_sec_3',
                    'meta_label' => 'Tiêu đề section 3',
                    'meta_type' => 'text',
                    'meta_value' => 'S - WATCH'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'sub_title_sec_3',
                    'meta_label' => 'Tiêu đề phụ section 3',
                    'meta_type' => 'text',
                    'meta_value' => 'Cam kết thành công, cùng chung trách nhiệm'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'des_sec_3',
                    'meta_label' => 'Mô tả section 3',
                    'meta_type' => 'editor',
                    'meta_value' => '<p>Chúng tôi là công ty công nghệ cung cấp những giải pháp đơn giản với chi phí tiết kiệm, giúp khách hàng nâng cao hiệu quả kinh doanh.</p> <p>Chúng tôi hướng tới tầm nhìn trở thành công ty cung cấp giải pháp công nghệ cho doanh nghiệp phổ biến tại Đông Nam Á.</p>'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'bg_img_sec_3',
                    'meta_label' => 'Ảnh nền section 3',
                    'meta_type' => 'image',
                    'meta_value' => json_encode([
                        'url' => 'images/background/bg-1.png',
                        'alt' => '',
                    ])
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'icons_sec_3',
                    'meta_label' => 'Chọn icon section 3',
                    'meta_type' => 'gallery',
                    'meta_value' => json_encode([
                        [
                            'url' => 'images/icon/icon_home_4.png',
                            'alt' => 'S - Watch'
                        ],
                        [
                            'url' => 'images/icon/icon_home_5.png',
                            'alt' => 'S - Watch'
                        ],
                        [
                            'url' => 'images/icon/icon_home_6.png',
                            'alt' => 'S - Watch'
                        ],
                        [
                            'url' => 'images/icon/icon_home_7.png',
                            'alt' => 'S - Watch'
                        ],
                        [
                            'url' => 'images/icon/icon_home_8.png',
                            'alt' => 'S - Watch'
                        ],
                    ])
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'link_sec_3',
                    'meta_label' => 'Liên kết section 3',
                    'meta_type' => 'link',
                    'meta_value' => json_encode([
                        'url' => '#',
                        'title' => 'Tìm hiểu thêm',
                        'target' => '_blank'
                    ])
                ],
//          Section 4
                [
                    'page_id' => '1',
                    'meta_key' => 'title_sec_4',
                    'meta_label' => 'Tiêu đề section 4',
                    'meta_type' => 'text',
                    'meta_value' => 'TIN TỨC NỔI BẬT'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'des_sec_4',
                    'meta_label' => 'Mô tả section 4',
                    'meta_type' => 'text',
                    'meta_value' => ''
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'bg_title_sec_4',
                    'meta_label' => 'Tiêu đề ẩn section 4',
                    'meta_type' => 'text',
                    'meta_value' => 'NEWS'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'choose_news_sec_4',
                    'meta_label' => 'Chọn tin tức section 4',
                    'meta_type' => 'posts',
                    'meta_value' => json_encode([1,2,3,4,5])
                ],
//          Section 5
                [
                    'page_id' => '1',
                    'meta_key' => 'title_sec_5',
                    'meta_label' => 'Tiêu đề section 5',
                    'meta_type' => 'text',
                    'meta_value' => 'THƯƠNG HIỆU'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'des_sec_5',
                    'meta_label' => 'Mô tả section 5',
                    'meta_type' => 'text',
                    'meta_value' => 'S-Watch sẵn sàng đồng hành cùng Quý đối tác trên mọi miền đất nước'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'bg_title_sec_5',
                    'meta_label' => 'Tiêu đề ẩn section 5',
                    'meta_type' => 'text',
                    'meta_value' => 'BRANDS'
                ],
                [
                    'page_id' => '1',
                    'meta_key' => 'brands_sec_5',
                    'meta_label' => 'Chọn thương hiệu section 5',
                    'meta_type' => 'brands',
                    'meta_value' => json_encode([1,2,3,4,5,6,7,8,9,10])
                ],
//          Options
                [
                    'page_id' => '999',
                    'meta_key' => 'logo_page',
                    'meta_label' => 'Chọn logo cho trang web',
                    'meta_type' => 'image',
                    'meta_value' => json_encode([
                        'url' => 'images/logo/page_logo_2.png',
                        'alt' => '',
                    ])
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'favicon',
                    'meta_label' => 'Chọn icon cho trang web',
                    'meta_type' => 'image',
                    'meta_value' => json_encode([
                        'url' => 'images/logo/page_logo_2.png',
                        'alt' => '',
                    ])
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'address_footer',
                    'meta_label' => 'Nhập địa chỉ footer',
                    'meta_type' => 'text',
                    'meta_value' => 'FPT Polytechnic - Tòa F Tân Hưng Thuận, Quận 12, Thành phố Hồ Chí Minh, Việt Nam'
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'map_iframe_footer',
                    'meta_label' => 'Nhập link google map footer',
                    'meta_type' => 'text',
                    'meta_value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1142.747860532402!2d106.62735183129713!3d10.852960517212846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b161f50ae47%3A0x2328d1d1acc3b11a!2sFPT%20Polytechnic%20-%20T%C3%B2a%20F!5e0!3m2!1svi!2s!4v1678504320294!5m2!1svi!2s',
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'phone_footer',
                    'meta_label' => 'Nhập số điện thoại footer',
                    'meta_type' => 'text',
                    'meta_value' => '0854.643.848'
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'fax_footer',
                    'meta_label' => 'Nhập địa chỉ fax',
                    'meta_type' => 'text',
                    'meta_value' => '0123456789'
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'email_footer',
                    'meta_label' => 'Nhập địa chỉ email',
                    'meta_type' => 'text',
                    'meta_value' => 'contact@beeswatch.online'
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'copyright',
                    'meta_label' => 'Nhập copyright',
                    'meta_type' => 'text',
                    'meta_value' => 'Copyright © 2023',
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'social_footer',
                    'meta_label' => 'Nhập icon mạng xã hội footer',
                    'meta_type' => 'repeater',
                    'meta_value' => json_encode([
                        [
                            [
                                'child_key' => 'icon',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/facebook.png',
                                    'alt' => '',
                                ],
                            ],
                            [
                                'child_key' => 'link',
                                'child_type' => 'link',
                                'child_label' => 'Nhập link',
                                'child_value' => [
                                    'title' => 'Facebook',
                                    'url' => 'https://www.facebook.com/',
                                    'target' => '_blank',
                                ]
                            ]
                        ],
                        [
                            [
                                'child_key' => 'icon',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/instagram.png',
                                    'alt' => '',
                                ],
                            ],
                            [
                                'child_key' => 'link',
                                'child_type' => 'link',
                                'child_label' => 'Nhập link',
                                'child_value' => [
                                    'title' => 'Instagram',
                                    'url' => 'https://www.instagram.com/',
                                    'target' => '_blank',
                                ]
                            ]
                        ],
                        [
                            [
                                'child_key' => 'icon',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/zalo.png',
                                    'alt' => '',
                                ]
                            ],
                            [
                                'child_key' => 'link',
                                'child_type' => 'link',
                                'child_label' => 'Nhập link',
                                'child_value' => [
                                    'title' => 'Zalo',
                                    'url' => 'https://chat.zalo.me/',
                                    'target' => '_blank',
                                ]
                            ]
                        ],
                        [
                            [
                                'child_key' => 'icon',
                                'child_type' => 'image',
                                'child_label' => 'Chọn icon',
                                'child_value' => [
                                    'url' => 'images/icon/youtube.png',
                                    'alt' => '',
                                ]
                            ],
                            [
                                'child_key' => 'link',
                                'child_type' => 'link',
                                'child_label' => 'Nhập link',
                                'child_value' => [
                                    'title' => 'Youtube',
                                    'url' => 'https://www.youtube.com/',
                                    'target' => '_blank',
                                ]
                            ]
                        ]
                    ]),
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'choose_pd_cat_footer',
                    'meta_label' => 'Chọn danh mục sản phẩm footer',
                    'meta_type' => 'pd_cat',
                    'meta_value' => json_encode([1,2,3,4])
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'choose_news_cat_footer',
                    'meta_label' => 'Chọn danh mục tin tức footer',
                    'meta_type' => 'news_cat',
                    'meta_value' => json_encode([1,2,3,4])
                ],
                [
                    'page_id' => '999',
                    'meta_key' => 'choose_link_footer',
                    'meta_label' => 'Nhập link footer',
                    'meta_type' => 'repeater',
                    'meta_value' => json_encode([
                        [
                            [
                                'child_key' => 'link',
                                'child_label' => 'Nhập link',
                                'child_type' => 'link',
                                'child_value'=> [
                                    'url' => 'http://127.0.0.1:8000/',
                                    'title' => 'Trang chủ',
                                    'target' => ''
                                ]
                            ],
                        ],
                        [
                            [
                                'child_key' => 'link',
                                'child_label' => 'Nhập link',
                                'child_type' => 'link',
                                'child_value'=> [
                                    'url' => 'http://127.0.0.1:8000/contact',
                                    'title' => 'Liên hệ',
                                    'target' => '_blank'
                                ]
                            ],
                        ],
                        [
                            [
                                'child_key' => 'link',
                                'child_label' => 'Nhập link',
                                'child_type' => 'link',
                                'child_value'=> [
                                    'url' => 'http://127.0.0.1:8000/shop',
                                    'title' => 'Sản phẩm',
                                    'target' => '_blank'
                                ]
                            ],
                        ]
                    ])
                ]
            ]
        );
    }
}
