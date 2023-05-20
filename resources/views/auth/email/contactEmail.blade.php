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
        .mail_container{
            background-color: #d9dffa;
            margin: 0 auto;
            max-width: 1200px;
            padding: 3.125rem 3.75rem 3rem;
        }
        h1{
            font-size: 34px;
            margin-bottom: 20px;
            color: #3155A6;
        }
        .box_email{
            margin: 0 auto;
            width: 600px;
            background-color: #fff;
            padding: 40px 50px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 0 15px #e1e1e1;
        }
        .item{
            margin-bottom: 0.625rem;
        }
        .item > p{
            text-align: justify;
            font-weight: 400;
            line-height: 1.56rem;
            margin: 0;
            padding-bottom: 0.125rem;
            border-bottom: 1px solid #b0b0b0;
            color: rgba(51, 51, 51, 0.95);
            font-size: 18px;
        }
        .item > span{
            font-size: 14px;
            display: block;
            color: #3155A6;
            font-weight: 500;
            margin-bottom: 0.18rem;
            text-align: left;
        }
        @media only screen and (max-width: 767px) {
            .mail_container{
                padding: 2rem 1rem;
            }
            h1{
                font-size: 38px;
            }
        }
    </style>
</head>
<body>
<div class="mail_container">
    <div class="box_email">
        <h1>MAIL LIÊN HỆ</h1>
        <div class="item">
            <span class="title">Tên người gửi:</span>
            <p>{{$data['name']}}</p>
        </div>
        @if(!empty($data['phone']))
            <div class="item">
                <span class="title">Số điện thoại:</span>
                <p><a href="tel:{{$data['phone']}}">{{$data['phone']}}</a></p>
            </div>
        @endif
        <div class="item">
            <span class="title">Email:</span>
            <p>{{$data['email']}}</p>
        </div>
        <div class="item">
            <span class="title">Nội dung:</span>
            <p>{{$data['message']}}</p>
        </div>
    </div>
</div>
</body>
</html>
