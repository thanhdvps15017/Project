<h2 class="sec_title text_center">Chi tiết đơn hàng</h2>
<div class="receiver_info">
    <div class="block" style="margin-right: 30px">
        <div class="title">
            Thông tin đơn hàng
        </div>
        <div class="info">
            <p><span>Đơn hàng</span> <strong>#{{$order->id}}</strong></p>
            <p><span>Ngày đặt:</span> <strong>{{date('d/m/Y', strtotime($order->created_at))}}</strong> </p>
            <p><span>Phương thức thanh toán:</span> <strong>{{$order->payment}}</strong></p>
            <p><span>Trạng thái:</span> <strong>{{$order->status}}</strong></p>
        </div>
    </div>
    <div class="block">
        <div class="title">
            Thông tin người nhận
        </div>
        <div class="info">
            <p>
                <span>Tên người nhận:</span> <strong>{{$order->name}}</strong>
            </p>
            <p>
                <span>Điện thoại:</span> <strong>{{$order->phone}}</strong>
            </p>
            <p>
                <span>Địa chỉ nhận hàng:</span> <strong>{{$order->address.' - '. $order->ward.' - '.$order->district.' - '.$order->province }}</strong>
            </p>
        </div>
    </div>
</div>
<table border="1">
    <thead>
    <tr>
        <th style="text-align:left; width: 64%;">Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
    </tr>
    </thead>
    <tbody>
    @php $total = 0 @endphp
    @foreach($details as $cart)
        @php
            $total += $cart->price * $cart->quantity;
        @endphp
        <tr>
            <td style="text-align:left; width: 64%;">{{$cart->product_name}}</td>
            <td style="text-align: center;">{{$cart->quantity}}</td>
            <td style="text-align: right;">{{number_format($cart->price, 0, ',' , '.')}}đ</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2" style="text-align:right">Tạm tính</th>
            <td style="text-align: right;">{{number_format($total)}}đ</td>
        </tr>
        <tr>
            <th colspan="2" style="text-align:right">Phí ship</th>
            <td style="text-align: right;">
                @php
                    if($order->province == 'Thành phố Hồ Chí Minh'){
                        $ship = 0;
                    }
                    else{
                        $ship = 30000;
                    }
                @endphp
                {{number_format($ship, 0, ',' , '.')}}đ
            </td>
        </tr>
        <tr>
            <th colspan="2" style="text-align:right">Giảm giá</th>
            <td style="text-align: right;">{{number_format($order->total - ($total + $ship), 0, ',' , '.')}}đ</td>
        </tr>
        <tr>
            <th colspan="2" style="text-align:right">Thành tiền</th>
            <td style="text-align: right;">{{number_format($order->total, 0, ',' , '.')}}đ</td>
        </tr>
    </tfoot>
</table>
<script>
    $("#order_details").removeClass('loading');
</script>
<style>
    #order_details .receiver_info{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 30px;
        margin-bottom: 20px;
    }
    #order_details .receiver_info .title{
        font-size: 24px;
        font-weight: 600;
        color: #1e3e86;
        margin-bottom: 15px;
        padding-bottom: 8px;
        position: relative;
    }
    #order_details .receiver_info .title:before{
        width: 120px;
        height: 2px;
        bottom: 0;
        left: 0;
        position: absolute;
        content: '';
        background-color: #F7941D;
    }
    #order_details .receiver_info p{
        margin-top: 0;
        font-size: 16px;
        margin-bottom: 12px;
        line-height: 24px;
    }
    #order_details .receiver_info p strong{
        font-weight: 600;
    }
    #order_details table{
        width: 100%;
        border-collapse: collapse;
    }
    #order_details table th,
    #order_details table td{
        padding: 8px 15px;
    }
    #order_details table tfoot tr:last-child td{
        font-weight: 700;
        font-size: 20px;
        line-height: 35px;
        color: #F7941D;
    }

</style>
{{--<div class="order_calculate">--}}
{{--    <p><span>Tạm tính: </span><strong>{{number_format($total, 0, ',', '.')}}đ</strong></p>--}}
{{--    <p><span>Giảm giá: </span><strong>{{number_format($data['total'] - $total - $data['ship'], 0, ',', '.')}}đ</strong></p>--}}
{{--    <p><span>Vận chuyển: </span><strong> {{number_format($data['ship'], 0, ',', '.')}}đ</strong></p>--}}
{{--    <div class="total"><strong>Thành tiền: </strong><span>{{number_format($order->total, 0, ',', '.')}}đ</span></div>--}}
{{--</div>--}}