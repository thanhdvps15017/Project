<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            font-family: "Roboto";
            font-size: 1rem;
        }
        .email_container{
            background-color: #d9dffa;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            padding: 50px 0;
        }
        .box_email{
            margin: 0 auto;
            width: 900px;
            background-color: #fff;
            padding: 40px 30px 10px 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px #e1e1e1;
        }
        .receiver_info{
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .receiver_info > div{
            width: calc(50% - 15px)
        }
        h1{
            font-size: 34px;
            margin-bottom: 30px;
            text-align: center;
        }
        .receiver_info .title{
            font-weight: 700;
            font-size: 24px;
            color: #3155A6;
            padding-bottom: 10px;
            margin-bottom: 15px;
            border-bottom: 1px solid #c5c5c5;
        }
        p{
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 17px;
            font-weight: 300;
            line-height: 25px;
        }
        p strong{
            font-weight: 500
        }
        .order_calculate{
            width: 40%;
            margin-left: auto;
        }
        .order_calculate p{
            display: flex;
            justify-content: space-between;
        }
        .total > *,
        .order_calculate p > *{
            display: block;
            width: 50%;
            text-align: right;
        }
        .total{
            display: flex;
            justify-content: space-between;
            text-align: right;
            font-size: 20px;
            align-items: center;
        }
        .total strong{
            color: #3155A6;
        }
        .total span{
            color: #F7941D;
            font-size: 24px;
            font-weight: 700;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table td,
        table th{
            padding: 10px 20px;
            text-align: right;
            font-size: 16px;
        }
        .text_thanks{
            margin-top: 20px;
        }
        .text_thanks{
            margin-top: 50px;
            text-align: center;
        }
        .text_thanks p{
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
<div class="email_container">
    <div class="box_email">
        <h1>Email xác nhận đơn hàng</h1>
        <div class="receiver_info">
            <div class="block" style="margin-right: 30px">
                <div class="title">
                    Thông tin đơn hàng
                </div>
                <div class="info">
                    <p><span>Đơn hàng</span> <strong>#80</strong></p>
                    <p><span>Ngày đặt:</span> <strong>{{date('d/m/Y')}}</strong> </p>
                    <p><span>Phương thức thanh toán:</span> <strong>{{$data['payment']}}</strong></p>
                </div>
            </div>
            <div class="block">
                <div class="title">
                    Thông tin người nhận
                </div>
                <div class="info">
                    <p>
                        <span>Tên người nhận:</span> <strong>{{$data['name']}}</strong>
                    </p>
                    <p>
                        <span>Điện thoại:</span> <strong>{{$data['phone']}}</strong>
                    </p>
                    <p>
                        <span>Địa chỉ nhận hàng:</span> <strong>{{$data['address']}}</strong>
                    </p>
                </div>
            </div>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th style="text-align:left; width: 70%;">Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
            @php $total = 0 @endphp
                @foreach($data['cart'] as $cart)
                    @php
                        $product = App\Http\Controllers\Controller::get_product($cart['product_id']);
                        $total += $product->price * $cart['quantity'];
                    @endphp
                    <tr>
                        <td style="text-align:left; width: 70%;">{{$product->name}}</td>
                        <td>{{$cart['quantity']}}</td>
                        <td>{{number_format($product->price, 0, ',' , '.')}}đ</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <div class="order_calculate">
            <p><span>Tạm tính: </span><strong>{{number_format($total, 0, ',', '.')}}đ</strong></p>
            <p><span>Giảm giá: </span><strong>{{number_format($data['total'] - $total - $data['ship'], 0, ',', '.')}}đ</strong></p>
            <p><span>Vận chuyển: </span><strong> {{number_format($data['ship'], 0, ',', '.')}}đ</strong></p>
            <div class="total"><strong>Thành tiền: </strong><span>{{number_format($data['total'], 0, ',', '.')}}đ</span></div>
        </div>
        <div class="text_thanks">
            <p>Xin cảm ơn quý khách đã tin tưởng mua hàng tại S Watch.</p>
            <p>
                <span>Mọi thắc mắc xin vui lòng liên hệ qua email: </span><a href="mailto:contact.beeswatch@gmail.com">contact.beeswatch@gmail.com</a>
            </p>
            <p><span>Hoặc qua số điện thoại: </span><a href="tel:0854643xxx">0854643xxx</a></p>
            <p style="font-size: 12px; color: #333333; margin-top: 20px;">Copyright © 2023 S - Watch</p>
        </div>
    </div>
</div>
</body>
</html>
