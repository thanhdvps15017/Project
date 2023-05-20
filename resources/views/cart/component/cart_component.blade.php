<style>
    body {
        font-family: 'Montserrat';
    }

    * {
        font-family: 'Montserrat';
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    section.cart_page {
        padding: 60px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table thead th {
        text-transform: uppercase;
        font-weight: 600;
        font-size: 15px;
    }

    table thead tr {
        height: 50px;
    }

    table tr {
        border-bottom: 1px solid #dedede;
        padding: 7px 10px;
    }

    .row {
        display: flex;
        grid-column-gap: 20px;
    }

    .row table {
        width: 70%;
    }

    .row .right_block {
        width: 30%;
        border: 1px solid #dedede;
        padding: 30px 20px 15px;
    }

    .text_center {
        text-align: center;
    }

    input.quatity {
        border: 1px solid #dedede !important;
        padding: 5px 10px;
    }

    td img {
        max-width: 80px;
    }

    a {
        color: #000
    }

    section.cart_page ul {
        flex-direction: column;
    }

    section.cart_page ul strong {
        display: inline-block;
        width: 130px;
        font-size: 16px;
    }

    section.cart_page ul li span {
        font-size: 14px;
    }

    section.cart_page ul li {
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    section.cart_page ul li:not(:last-child) {
        border-bottom: 1px solid #dedede;

    }

    li.checkout a {
        padding: 7px 40px;
        background-color: #000000;
        border: 1px solid #000000;
        color: #FFF;
        font-weight: 700;
        text-transform: uppercase;
        cursor: pointer;
        -webkit-transition: 0.3s ease-in-out;
        -moz-transition: 0.3s ease-in-out;
        -ms-transition: 0.3s ease-in-out;
        -o-transition: 0.3s ease-in-out;
        transition: 0.3s ease-in-out;
        margin-top: 10px;
        display: block;
    }

    li.checkout a:hover {
        background-color: transparent;
        color: #000000
    }
</style>
<section class="section cart_page">
    <div class="grid-container">
        <div class="cart" data-url="{{ route('deleteCart') }}">
            <h1 class="text_center sec_title">Giỏ hàng của bạn</h1>
            <div class="container">
                @if(isset($cart) && count($cart) > 0)
                    <div class="cart_wrap">
                        <div class="left_col update_cart_url" data-url="{{ route('updateCart') }}">
                            @php  $i=1; $total = 0; @endphp
                            @foreach($cart as $id => $item)
                                @php
                                    $product = App\Http\Controllers\Controller::get_product($item['product_id']);
                                    $total += $product->price * $item['quantity'];
                                        if(auth()->check()){
                                            $cart_id = $item['id'];
                                        }
                                        else{
                                            $cart_id = $id;
                                        }
                                        $img = json_decode($product->images)
                                @endphp
                                <div class="cart_item">
                                    <div class="pd_info">
                                        <div class="img_wrap">
                                            <a href="#">
                                                {!! App\Http\Controllers\Controller::get_img_attachment($img[0])!!}
                                            </a>
                                        </div>
                                        <div class="name_group">
                                            <h3 class="pd_name">
                                                <a href="{{url('/single-product/'.$product->slug)}}">
                                                    {{ $product->name }}
                                                </a>
                                            </h3>
                                            <div class="pd_price">
                                                {{ number_format($product->price, 0 , ',','.') }}đ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="quantity_btn">
                                            <div class="minus quant" data-id="{{ $cart_id }}">
                                                <i class="fas fa-minus"></i>
                                            </div>
                                            {{--                                            <div class="quantity">--}}
                                            <input max="99" min="1" value="{{ $item['quantity'] }}" type="number" class="quatity text_center">
                                            {{--                                            </div>--}}
                                            <div class="plus quant" data-id="{{ $cart_id }}">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="cart_action">
                                            <a href="" data-id-pro="@if(auth()->check()){{$item->product_id}}@else{{ $item['product_id']}}@endif" class="cart_delete" data-id="{{ $cart_id }}"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div class="right_col">
                            <div class="cart_total">
                                <div class="calculate">
                                    <div class="item">
                                        <span>Tạm tính:</span>
                                        <strong>{{ number_format($total, 0, ',', '.') }}đ</strong>
                                    </div>
{{--                                    <div class="item">--}}
{{--                                        <span>Giảm giá: </span>--}}
{{--                                        <strong>--}}
{{--                                            {{number_format($discount, 0, ',', '.') }}đ--}}
{{--                                        </strong>--}}
{{--                                    </div>--}}
                                    <div class="item">
                                        <span>Giao hàng </span>
                                        <strong>30.000đ</strong>
                                    </div>
                                </div>
                                <div class="total">
                                    <span>Thành tiền: </span>
                                    <strong>{{ number_format($total + 30000, 0, ',', '.') }}đ</strong>
                                </div>
                                <div class="choose_payment">
                                    <h4>Chọn phương thức thanh toán</h4>
                                    <div class="payment_wrap active">
                                        <div class="inner">
                                            <input checked type="radio" name="payment_method" value="cod" id="cod">
                                            <label for="cod">Thanh toán khi nhận hàng</label>
                                        </div>
                                        <div class="payment_des active">
                                            Thanh toán tiền mặt khi đã nhận được hàng
                                        </div>
                                    </div>
                                    <div class="payment_wrap">
                                        <div class="inner">
                                            <input type="radio" name="payment_method" value="vnpay" id="vnpay">
                                            <label for="vnpay">Thanh toán qua cổng VNPay</label>
                                        </div>
                                        <div class="payment_des">
                                            Thực hiện thanh toán qua ví điện tử VNPay của chúng tôi. Vui lòng giữ mã đơn hàng của bạn
                                        </div>
                                    </div>
                                </div>
                                <div class="go-checkout text_center">
                                    @if(Auth::user())
                                        <a href="{{ route('order') }}" class="btn_primary btn-order btn text_center">Tiến hành thanh toán</a>
                                    @else
                                        <span class="notify">Bạn cần đăng nhập để thanh toán</span>
                                        <a class="btn_small btn_secondary" href="{{ route('login') }}">Đăng nhập</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="cart_empty">
                        <div class="img_wrap">
                            <img src="{{asset('images/empty_cart.png')}}" style="margin: 0 auto;">
                        </div>
                        <div class="text_center">
                            <h3>Giỏ hàng của bạn đang rỗng! Đặt hàng ngay tại link bên dưới</h3>
                            <a href="/shop" class="btn_primary btn"><strong>Đặt hàng ngay</strong></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</section>
@push('js')

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-order').on('click',function (e) {
            // e.preventDefault();
            const payment_method = $('.payment_wrap input:checked').val();
            $.ajax({
                url: '{{route("applyPayment")}}',
                method: 'POST',
                data: {
                    payment_method,
                    _token: $('meta[name="csrf-token"]').attr('content')
            },
            })
          })
        });
</script>
@endpush
