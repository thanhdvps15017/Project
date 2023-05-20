@extends('layouts.guest')
@section('description'){{$products->description}}@endsection
@section('title'){{$products->name}}@endsection
@section('keywords'){{$products->keywords}}@endsection
@foreach ($page_meta as $val)
    @switch($val->meta_key)
        @case('banner_detail_pd')
            @php $banner_image = $val->meta_value @endphp
            @break
    @endswitch
@endforeach
@foreach($footer['footer_meta'] as $item)
    @switch($item->meta_key)
        @case('default_banner')
            @php $default_banner = $item->meta_value @endphp
            @break
    @endswitch
@endforeach
@if(empty($banner_image))
    @php $banner_image = $default_banner @endphp
@endif
@section('banner'){{asset(App\Http\Controllers\Controller::get_img_url($banner_image))}}@endsection
@section('content')
@php
    $images = json_decode($products->images);
@endphp
<section class="section single_product_1">
    <div class="grid-container">
        <div class="grid-40 tablet-grid-40 mobile-grid-100">
            <div class="box_swiper product_gallery">
                <div style="margin-bottom: 10px; --swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper pd_swiper">
                    <div class="swiper-wrapper">
                        @foreach($images as $img)
                            <div class="swiper-slide">
                                {!! App\Http\Controllers\Controller::get_img_attachment($img)!!}
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper pd_swiper_thumb">
                    <div class="swiper-wrapper">
                        @foreach($images as $img)
                            <div class="swiper-slide">
                                {!! App\Http\Controllers\Controller::get_img_attachment($img)!!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-60 tablet-grid-60 mobile-grid-100">
            <div class="single_product_name">
                {{ $products->name }}
            </div>
            <div class="single_product_cont text_over">
                <div class="nav_bar">
                    <ul>
                        <li>Loại sản phẩm: <a href="">@foreach($brands as $data){{ $data->name }} @endforeach</a></li>
                    </ul>
                </div>
                <div class="single_product_price">
                    @if( (isset($products->discount)) && ($products->discount > 0) )
                    <div class="prod_price">
                        <h3 class="discount">
                            {{ number_format($price = ($products->price*(100 - $products->discount)/100), 0, ",", ".")}}
                            vnđ
                        </h3>
                        <del>
                            {{ number_format( $price = $products->price, 0, ",", ".")}} vnđ
                        </del>
                    </div>
                    @else
                    <div class="prod_price">
                        <h3 class="discount">
                            {{ number_format($products->price*(100 - $products->discount)/100, 0, ",", ".")}} vnđ
                        </h3>
                    </div>
                    @endif
                </div>
                <div class="description">
                    {!! $products->description !!}
                </div>
                <div class="product_action">
                    <form id="addCartForm" method="GET" action="/add-cart/{{$products->id}}">
                        @csrf
                        @if((int)$products->quantity > 0)
                            <div class="qtty_box">
                                <span class="qtty_minus">
                                    <i class="fas fa-minus"></i>
                                </span>
                                    <input max="99" min="1" value="1" type="number" name="quantity" id="pd_quantity">
                                    <span class="qtty_plus">
                                    <i class="fas fa-plus"></i>
                                </span>
                            </div>
                            <button type="submit" class="add_to_cart_btn add_cart" style="border: none">
                                Thêm vào giỏ hàng
                            </button>
                        @else
                            <button type="button" class="out_stock" style="border: none">
                                Sản phẩm tạm thời hết hàng :(
                            </button>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="single_product_2 section">
    <ul>
        <li class="active" id="mota">Mô tả</li>
        <li id="cmt" class="">Bình luận</li>
    </ul>
    <div class="grid-container">
        <div class="prod_des active" id="mota">
            {!! $products->contents !!}
        </div>
        <div class="prod_cmt" id="cmt">
            <section>
                <div class="comment_wrapper">
                    @if(!empty($comments))
                        <div class="comment_box">
                            <h3 class=""><span class="comment_count">{{count($comments)}}</span> bình luận</h3>
                            <div class='comment_list'>
                                @foreach($comments as $productComment)
                                    @php $user = App\Http\Controllers\Controller::get_user_by_id($productComment->user_id); @endphp
                                    <div class="comment_item">
                                        <div class="comment_avatar">
                                            <img src="{{asset($user->avatar)}}" alt="">
                                        </div>
                                        <div class="comment_content">
                                            <div class="comment_content_title">
                                                <h5 class="comment_name">{{$user->name}}</h5>
                                                <span class="comment_date"><i class="far fa-clock"></i>{{date('d-m-Y', strtotime($productComment->created_at))}}</span>
                                            </div>
                                            <p class="comment_message">{{$productComment->message}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(Auth::check())
                        <div class="form-comment">
                            <form action="/addProductComment" method="POST" id="comment_form">
                                @csrf
                                <div class="avatar_current">
                                    <img src="{{asset(Auth::user()->avatar)}}" alt="">
                                </div>
                                <div class="add_comment_box">
                                    <textarea name="message" id="message" rows="3" placeholder="Để lại bình luận của bạn"></textarea>
                                    @error('message')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                    <input type="hidden" name="pd_id" value="{{$products->id}}" class="pd_id">
                                    <button type="submit" class="btn-submit">
                                        <span>GỬI</span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.711 3.36355L2.24282 8.29049C2.09586 8.33194 1.96506 8.41725 1.86789 8.53503C1.77072 8.65281 1.71181 8.79744 1.69904 8.9496C1.68627 9.10175 1.72024 9.25418 1.79642 9.38651C1.8726 9.51884 1.98736 9.62476 2.12535 9.69013L10.1514 13.4919C10.3079 13.5661 10.434 13.6921 10.5081 13.8487L14.3099 21.8747C14.3753 22.0127 14.4812 22.1274 14.6135 22.2036C14.7458 22.2798 14.8983 22.3138 15.0504 22.301C15.2026 22.2882 15.3472 22.2293 15.465 22.1321C15.5828 22.035 15.6681 21.9042 15.7095 21.7572L20.6365 4.28898C20.6727 4.16067 20.674 4.02503 20.6403 3.89603C20.6067 3.76703 20.5392 3.64933 20.445 3.55506C20.3507 3.46079 20.233 3.39335 20.104 3.35969C19.975 3.32603 19.8394 3.32736 19.711 3.36355Z" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.3934 13.6066L14.636 9.36395" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="text_center">
                            <h4>Bạn cần đăng nhập để thực hiện chức năng bình luận</h4>
                        </div>
                    @endif
                </div>

            </section>
        </div>
    </div>
</section>
<section class="single_product_3 section">
    <div class="grid-container">
        <div class="section_heading text_center">
            <div class="title_group">
                <div class="bg_title">Related</div>
                <div class="sec_title">Sản phẩm liên quan</div>
            </div>
        </div>
        <div class="box_swiper">
            <div class="swiper relatedProd">
                <div class="swiper-wrapper">
                    @foreach($productLimit as $data)
                        @php $img = json_decode($data->images) @endphp
                        <div class="swiper-slide shop_item_wrap grid">
                            <div class="item">
                                <div class="prod-popup" id="prod-1">
                                    <div class="bg_close"></div>
                                    <div class="popup">
                                        <div class="grid-container">
                                            <div class="grid-40">
                                                {!! App\Http\Controllers\Controller::get_img_attachment($img[0])!!}
                                            </div>
                                            <div class="grid-60">
                                                <div class="title_gr">
                                                    <a href="{{url('single-product/'.$data->slug)}}">{{$data->name}}</a>
{{--                                                    <p>Loại sản phẩm: <a href="#">Brand 1</a></p>--}}
                                                </div>
                                                <div class="price_gr">
                                                    <h3>{{$data->price_pay}} <del>{{$data->price}}</del></h3>
                                                    <p><span>Trạng thái: </span>Còn hàng</p>
                                                </div>
                                                <div class="popup_des">
                                                    {!! $data->description !!}
                                                </div>
                                                <div class="popup_action">

                                                    @if((int)$data->quantity > 0)
                                                        <div class="qtty_box">
                                                            <span class="qtty_minus">
                                                                <i class="fas fa-minus"></i>
                                                            </span>
                                                            <input max="99" min="1" value="1" type="number" name="quantity" id="pd_quantity">
                                                            <span class="qtty_plus">
                                                                <i class="fas fa-plus"></i>
                                                            </span>
                                                        </div>
                                                        <button type="submit" class="add_to_cart_btn add_cart" style="border: none">
                                                            Thêm vào giỏ hàng
                                                        </button>
                                                    @else
                                                        <button type="button" class="out_stock" style="border: none">
                                                            Sản phẩm tạm thời hết hàng :(
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="close_btn">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <figure class="imghvr-zoom-in">
                                    {!! App\Http\Controllers\Controller::get_img_attachment($img[0])!!}
                                    <figcaption>
                                        <div class="icon_wrap">
                                            <a title="Thêm vào giỏ hàng" href="#">
                                                <i class="fas fa-cart-plus"></i>
                                            </a>
                                            <a title="Xem nhanh sản phẩm" class="showPopup" data-id="1">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a title="Thêm vào yêu thích" href="#">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        </div>
                                    </figcaption>

                                    <div class="badge sale">
                                        Sale
                                    </div>
                                </figure>
                                <div class="prod_cont">
                                    <div class="prod_name">
                                        <a href="{{url('single-product/'.$data->slug)}}">{{$data->name}} </a>
                                    </div>
                                </div>
                                <div class="prod_actions">
                                    <div class="prod_price">
                                        <span class="discount">
                                            {{number_format($data->price_pay,0 , ',','.')}}đ
                                        </span>
                                        <del>
                                            {{number_format($data->price,0 , ',','.')}}đ
                                        </del>
                                    </div>
                                    <div class="btn_wrap">
                                        <a href="" class="add_to_cart_btn">
                                            Thêm vào giỏ hàng
                                        </a>
                                    </div>
                                    <div class="btn_wrap">
                                        <div class="add_to_wishlist">
                                            <i class="far fa-heart"></i>
                                            <span>Thêm vào yêu thích</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="outside-btn prev">
                <svg width="28" height="46" viewBox="0 0 25 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.25 47.125L1.125 24L24.25 0.875" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="outside-btn next">
                <svg width="28" height="46" viewBox="0 0 25 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.75 0.875L23.875 24L0.75 47.125" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
            </div>
        </div>
    </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).delegate("#addCartForm","submit", function(e){
        e.preventDefault();
        let urlcart = $(this).attr('action');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"GET",
            url: urlcart,
            data: $("#addCartForm").serialize(),
            dataType:'json',
            success: function (data){
                Swal.fire({
                    title: 'Thêm vào giỏ hàng thành công !!',
                    text: "Bạn có muốn kiểm tra giỏ hàng không?",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/show-cart";
                    }
                    else{
                        $("#pd_quantity").val(1)
                    }
                })

            },
            error: function (){

            }
        });
    })
    @if(Auth::check())
        $(document).delegate("#comment_form", "submit", function(e){
            e.preventDefault();
            var url = $(this).attr('action'),
                id = $("input.pd_id").val(),
                user_id = {{Auth()->id()}},
                message = $("textarea#message").val(),
                count_cmt = parseInt($('.comment_count').text());

                count_cmt++;

                const date = new Date();
                let currentDay= String(date.getDate()).padStart(2, '0');
                let currentMonth = String(date.getMonth()+1).padStart(2,"0");
                let currentYear = date.getFullYear();
                let currentDate = `${currentDay}-${currentMonth}-${currentYear}`;

            result = $('.comment_list');
            result.append(`<div class="comment_item">
                                <div class="comment_avatar">
                                    <img src="{{asset(Auth::user()->avatar)}}" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_content_title">
                                        <h5 class="comment_name">{{Auth::user()->name}}</h5>
                                        <span class="comment_date"><i class="far fa-clock"></i>`+currentDate+`</span>
                                    </div>
                                    <p class="comment_message">`+message+`</p>
                                </div>
                            </div>`)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method:"post",
                url: url,
                data: $("#comment_form").serialize(),
                dataType:'json',
            });
        $("textarea#message").val(' ');
        $('.comment_count').text(count_cmt)
        });
    @endif
</script>
@endsection
