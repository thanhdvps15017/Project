@extends('layouts.guest')
@section('description'){{$page->description}}@endsection
@section('title'){{$page->title}}@endsection
@section('keywords'){{$page->keywords}}@endsection
@foreach ($page_meta as $val)
    @switch($val->meta_key)
        @case('banner_image')
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
<section class="shop_container grid-container">
    <div class="shop_aside grid-25">
        <div class="filter_box">
            <div class="block_wrap cat_box">
                <h3 class="block_title">Danh mục sản phẩm</h3>
                <ul>
                    @foreach($cats as $cat)
                        <li data-id="{{$cat->id}}" data-tax="cat">
                            <div class="check_box">
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.25 0.750488L6.75 11.25L1.5 6.00049" stroke="#F7941D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span>
                            {{$cat->name}}
                        </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="block_wrap brands_box">
                <h3 class="block_title">Thương hiệu</h3>
                <ul>
                    @foreach($brands as $brand)
                        <li data-id="{{$brand->id}}" data-tax="brand">
                            <div class="check_box">
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.25 0.750488L6.75 11.25L1.5 6.00049" stroke="#F7941D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span>
                        {{$brand->name}}
                    </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="show_filter_btn">
                <svg class="show_filter_btn_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.94543 4.5H20.0546C20.1999 4.5 20.3421 4.54221 20.4638 4.62149C20.5856 4.70077 20.6817 4.81371 20.7405 4.94658C20.7993 5.07946 20.8182 5.22655 20.7949 5.36998C20.7717 5.51341 20.7073 5.64699 20.6096 5.7545L14.4451 12.5355C14.3196 12.6735 14.25 12.8534 14.25 13.04V18.3486C14.25 18.4721 14.2195 18.5936 14.1613 18.7025C14.103 18.8114 14.0188 18.9042 13.916 18.9726L10.916 20.9727C10.8031 21.048 10.6718 21.0912 10.5362 21.0977C10.4006 21.1043 10.2658 21.0739 10.1461 21.0099C10.0264 20.9458 9.92638 20.8505 9.85662 20.734C9.78687 20.6176 9.75002 20.4844 9.75002 20.3486V13.04C9.75002 12.8534 9.68048 12.6735 9.55498 12.5355L3.39048 5.7545C3.29274 5.64699 3.22834 5.51341 3.20509 5.36998C3.18185 5.22655 3.20077 5.07946 3.25955 4.94658C3.31833 4.81371 3.41444 4.70077 3.5362 4.62149C3.65797 4.54221 3.80014 4.5 3.94543 4.5V4.5Z" stroke="#ffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <svg class="show_filter_btn_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.25 12H3.75" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.5 5.25L3.75 12L10.5 18.75" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="shop_main grid-75 tablet-grid-100 mobile-grid-100">
        <div class="shop_nav">
            <div class="prod_count">
                <strong>12</strong>
                <span>sản phẩm trong tổng số</span>
                <strong>{{ $products->total() }}</strong>
            </div>
            <div class="prod_soft">
                <span>Sắp xếp theo mặc định</span>
                <ul>
                    <li data-sort="created_at-desc">Sản phẩm mới nhất</li>
                    <li data-sort="created_at-asc">Sản phẩm cũ nhất</li>
                    <li data-sort="price-desc">Giá cao nhất</li>
                    <li data-sort="price-asc">Giá thấp nhất</li>
                    <li data-sort="name-asc">A - Z</li>
                    <li data-sort="name-desc">Z - A</li>
                </ul>
            </div>
            <div id="prod_view" class="prod_view">
                <div id="grid_icon" class="active">
                    <i class="fas fa-th"></i>
                </div>
                <div id="list_icon">
                    <i class="fas fa-list-ul"></i>
                </div>
            </div>
        </div>
        <div id="shop_wrap">
            <div class="shop_item_wrap grid">
                @foreach($products as $product)
                    @php $img = json_decode($product->images) @endphp
                    {{-- Lấy thông tin sản phẩm--}}
                    <div class="item">
                        <div class="prod-popup" id="prod-{{$product->id}}">
                            <div class="bg_close"></div>
                            <div class="popup">
                                <div class="grid-container">
                                    <div class="grid-40">
                                        {!! App\Http\Controllers\Controller::get_img_attachment($img[0])!!}
                                    </div>
                                    <div class="grid-60">
                                        <div class="title_gr">
                                            <a href="#">Tên sản phẩm : {{$product->name}}</a>
                                        </div>
                                        @if( (isset($product->discount)) && ($product->discount > 0) )
                                            <div class="price_gr">
                                                <h3>{{number_format($product->price*(100 - $product->discount)/100, 0, ",", ".")}}
                                                    vnđ
                                                    <del>{{number_format($product->price, 0, ",", ".")}} vnđ</del>
                                                </h3>
                                                @if((int)$product->quantity > 0)
                                                <p><span>Trạng thái: </span>Còn hàng</p>
                                                @else
                                                <p><span>Trạng thái: </span>Hết hàng</p>
                                                @endif
                                            </div>
                                        @else
                                            <div class="price_gr">
                                                <h3>{{number_format($product->price*(100 - $product->discount)/100, 0, ",", ".")}}
                                                    vnđ </h3>
                                                    @if((int)$product->quantity > 0)
                                                    <p><span>Trạng thái: </span>Còn hàng</p>
                                                    @else
                                                    <p><span>Trạng thái: </span>Hết hàng</p>
                                                    @endif
                                            </div>
                                        @endif
                                        <div class="popup_des">
                                            {!! $product->description !!}
                                        </div>
                                        <div class="popup_action">
                                            @if((int)$product->quantity > 0)
                                                <a href="#" class="add_to_cart_btn add_cart"
                                                   data-url="{{ route('addCart', ['id' => $product->id]) }}">
                                                    Thêm vào giỏ hàng
                                                </a>
                                            @else
                                                <a href="#" class="add_to_cart_btn">
                                                    Sản phẩm tạm thời hết hàng
                                                </a>
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
                                    @if((int)$product->quantity > 0)
                                        <a title="Thêm vào giỏ hàng" href="#" class="add_to_cart_btn add_cart"
                                           data-url="{{ route('addCart', ['id' => $product->id]) }}">
                                            <i class="fas fa-cart-plus"></i>
                                        </a>
                                    @endif
                                    <a title="Xem nhanh sản phẩm" class="showPopup" data-id="{{ $product->id}}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </div>
                            </figcaption>
                            @if( (isset($product->discount)) && ($product->discount > 0) )
                                <div class="badge sale">
                                    -{{$product->discount}}%
                                </div>
                            @endif
                        </figure>
                        <div class="prod_cont">
                            <div class="prod_name">
                                <a href="{{url('single-product/'.$product->slug)}}">{{$product->name}}</a>
                            </div>
                            <div class="prod_des">
                                {{ $product->description }}
                            </div>
                        </div>
                        <div class="prod_actions">
                            @if( (isset($product->discount)) && ($product->discount > 0) )
                                <div class="prod_price">
                        <span class="discount">
                            {{ number_format($price = ($product->price*(100 - $product->discount)/100), 0, ",", ".")}}
                            vnđ
                        </span>
                                    <del>
                                        {{ number_format($product->price, 0, ",", ".")}} vnđ
                                    </del>
                                </div>
                            @else
                                <div class="prod_price">
                        <span class="discount">
                            {{ number_format($product->price*(100 - $product->discount)/100, 0, ",", ".")}} vnđ
                        </span>
                                </div>
                            @endif

                            <div class="btn_wrap">
                            @if((int)$product->quantity > 0)
                                <a href="#" class="add_to_cart_btn add_cart"
                                    data-url="{{ route('addCart', ['id' => $product->id]) }}">
                                    Thêm vào giỏ hàng
                                </a>
                                @else
                                <a href="#" class="add_to_cart_btn">
                                    Sản phẩm tạm thời hết hàng
                                </a>
                            @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="Page pagination m-auto">
                <?php
                $total = $products->total();
                $pages = ceil($total / $products->perPage());
                ?>
                <ul class="pagination">
                    <li class="prev page-item">
                        <a class="page-link" href="{{$products->previousPageUrl()}}">
                            <i class="zmdi zmdi-chevron-left"></i>
                        </a>
                    </li>
                    @for($i = 1; $i <= $pages; $i++) <li
                        class="@if($products->currentPage() == $i)current @endif page-item">
                        <a class="page-link" @if($products->currentPage() != $i)href="{{$products->url($i)}}" @endif>
                            {{$i}}
                        </a>
                    </li>

                    @endfor
                    <li class="next page-item">
                        <a class="page-link" href="{{$products->nextPageUrl()}}">
                            <i class="zmdi zmdi-chevron-right"></i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>
<input id="filter_input" type="hidden" data-cat="all" data-brand="all" data-url="{{route('productsFilter')}}" data-sort="created_at-desc">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    jQuery(document).delegate(".shop_aside .block_wrap li", "click", function(e){
        e.preventDefault();
        var id = jQuery(this).attr('data-id'),
            tax = jQuery(this).attr('data-tax'),
            input = jQuery("#filter_input"),
            url = input.attr('data-url');
        if(jQuery(this).hasClass('active')){
            jQuery(this).removeClass('active');
            input.attr('data-'+tax, 'all');
        }
        else{
            jQuery(this).parent().children().removeClass('active');
            jQuery(this).addClass('active')
            input.attr('data-'+tax, id);
        }
        var brand = input.attr('data-brand'),
            cat = input.attr('data-cat'),
            sort = input.attr('data-sort'),
            arr = sort.split('-'),
            orderby = arr[0],
            order = arr[1];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#shop_wrap').empty().load(url, {brand: brand, pd_cat: cat, sort_by: orderby, sort: order});
    })

    jQuery(document).delegate(".prod_soft > ul > li", "click", function(e){
        e.preventDefault()
        var value = jQuery(this).attr('data-sort'),
            input = jQuery("#filter_input");
        input.attr('data-sort', value)
        var brand = input.attr('data-brand'),
            cat = input.attr('data-cat'),
            sort = input.attr('data-sort'),
            arr = sort.split('-'),
            orderby = arr[0],
            order = arr[1],
            url = input.attr('data-url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#shop_wrap').empty().load(url, {brand: brand, pd_cat: cat, sort_by: orderby, sort: order});
    })
    function addcart(event){
        event.preventDefault();
        jQuery(".prod-popup.active").removeClass('active');
        let urlcart = $(this).data('url');
        $.ajax({
            type:"GET",
            url:urlcart,
            dataType: 'json',
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
                })

            },
            error: function (){

            }
        });
    }
    $(function(){
        $('.add_cart').on('click', addcart)
    });
    $(document).ready(function () {
        @if (Session::has('msg'))
        toastr.success('{{ Session::get('msg') }}');
        @elseif(Session::has('success'))
        toastr.error('{{ Session::get('success') }}');
        @endif
    });
</script>
@endsection
