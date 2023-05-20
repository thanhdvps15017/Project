@extends('layouts.guest')
@section('content')
    <section class="shop_container grid-container">
        <div class="shop_aside grid-25">
            <div class="block_wrap">
                <h3 class="block_title" >Danh mục sản phẩm</h3>
                <ul>
                    @foreach($cats as $cat)
                        <li>
                            <a href="{{url('/shop/category/'.$cat->id)}}">
                                {{$cat->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="block_wrap">
                <h3 class="block_title">Thương hiệu</h3>
                <ul>
                    @foreach($brands as $brand)
                        <li>
                            <a href="{{url('/shop/brand/'.$brand->id)}}">
                                {{$brand->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="shop_main grid-75">
            <div class="shop_nav">
                <div class="prod_count">
                    <strong>12</strong>
                    <span>sản phẩm trong tổng số</span>
                    <strong>{{ $products->count() }}</strong>
                </div>
                <div class="prod_soft">
                    <span>Sắp xếp theo mặc định</span>
                    <ul>
                        <li><a href="{{ url('/shop') }}">Sắp xếp theo mặc định</a></li>
                        <li><a href="{{ url('/shop/ascending') }}">Sắp xếp theo giá tăng dần<a></li>
                        <li><a href="{{ url('/shop/decrease') }}">Sắp xếp theo giá giảm dần</a></li>
                        <li><a href="{{ url('/shop/view') }}">Sắp xếp theo lượt xem</a></li>
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
            <div class="shop_item_wrap grid">
            @foreach($products as $product)
    {{--                Lấy thông tin sản phẩm--}}
                    <div class="item">
                    <div class="prod-popup" id="prod-{{$product->id}}">
                        <div class="bg_close"></div>
                        <div class="popup">
                            <div class="grid-container">
                                <div class="grid-40">
                                    <img src="{{$product->images}}" alt="example-image">
                                </div>
                                <div class="grid-60">
                                    <div class="title_gr">
                                        <a href="#">Tên sản phẩm : {{$product->name}}</a>
                                    </div>
                                    @if( (isset($product->discount)) && ($product->discount > 0)  )
                                    <div class="price_gr">
                                        <h3>{{number_format($product->price*(100 - $product->discount)/100, 0, ",", ".")}} vnđ 
                                            <del>{{number_format($product->price, 0, ",", ".")}} vnđ</del>
                                        </h3>
                                        <p><span>Trạng thái: </span>Còn hàng</p>
                                    </div>
                                    @else
                                    <div class="price_gr">
                                        <h3>{{number_format($product->price*(100 - $product->discount)/100, 0, ",", ".")}} vnđ </h3>
                                        <p><span>Trạng thái: </span>Còn hàng</p>
                                    </div>
                                    @endif
                                    <div class="popup_des">
                                        {{$product->description}}
                                    </div>
                                    <div class="popup_action">
                                        <a href="#" class="add_to_cart_btn add_cart" data-url="{{ route('addCart', ['id' => $product->id]) }}">
                                            Thêm vào giỏ hàng
                                        </a>
                                    </div>
                                </div>
                                <div class="close_btn">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <figure class="imghvr-zoom-in">
                        <img src="{{ asset('/images/prod_img.png') }}" alt="example-image">
                        <figcaption>
                            <div class="icon_wrap">
                                <a title="Thêm vào giỏ hàng" href="#" class="add_to_cart_btn add_cart" data-url="{{ route('addCart', ['id' => $product->id]) }}">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                                <a title="Xem nhanh sản phẩm" class="showPopup" data-id="{{ $product->id}}">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a title="Thêm vào yêu thích" href="#">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                        </figcaption>
                        @if( (isset($product->discount)) && ($product->discount > 0)  )
                        <div class="badge sale">
                            - {{$product->discount}} %
                        </div>
                        @endif
                    </figure>
                    <div class="prod_cont">
                        <div class="prod_name">
                            <a href="{{url('single-product/'.$product->id)}}">{{$product->name}}</a>
                        </div>
                        <div class="prod_des">
                            {{ $product->description }}
                        </div>
                    </div>
                    <div class="prod_actions">
                        @if( (isset($product->discount)) && ($product->discount > 0)  )
                            <div class="prod_price">
                                <span class="discount">
                                    {{ number_format($product->price*(100 - $product->discount)/100, 0, ",", ".")}} vnđ
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
                            <a href="#" class="add_to_cart_btn add_cart" data-url="{{ route('addCart', ['id' => $product->id]) }}">
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
                    @for($i = 1; $i <= $pages; $i++)
                        <li class="@if($products->currentPage() == $i)current @endif page-item">
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
    </section>

    <script>
        function addcart(event){
            event.preventDefault();
            let urlcart = $(this).data('url');
            $.ajax({
                type:"GET",
                url:urlcart,
                dataType: 'json',
                success: function (data){
                    if(data.code === 200){
                        alert ('thêm sản phẩm thành công !!');
                    }
                },
                error: function (){

                }
            });
        }
        $(function(){
            $('.add_cart').on('click', addcart)
        });
    </script>
@endsection

