<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: "Roboto";
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
            width: 600px;
            background-color: #fff;
            padding: 40px 50px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 0 15px #e1e1e1;
        }
        h1{
            font-size: 34px;
            margin-bottom: 20px;
        }
        p{
            font-size: 18px;
            margin-bottom: 8px;
            font-weight: 400;
        }
        a.reset_btn{
            display: inline-block;
            padding: 14px 50px;
            background-color: #3155A6;
            border-radius: 50px;
            color: #FFF;
            text-decoration: none;
            font-size: 20px;
            font-weight: 700;
            margin: 20px 0 25px;
            border: 1px solid #3155A6;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        a.reset_btn:hover{
            background-color: #fff;
            color: #3155A6;
        }
        .box_info{
            border-top: 1px solid #e1e1e1;
            padding-top: 20px;
        }
        .box_info p:last-of-type{
            margin-top: 50px;
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: -30px;
        }
        .box_info a{
            position: relative;
            text-decoration: none;
            color: #3155A6;
            display: inline-block;
        }
        .box_info a:before{
            width: 0;
            position: absolute;
            bottom: 0;
            content: '';
            height: 1px;
            background: #3155A6;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .box_info a:hover:before{
            width: 100%;
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="email_container">
    <div class="box_email">
        <h1>Quên mật khẩu?</h1>
        <p>Chúng tôi vừa nhận được yêu cầu cập nhật mật khẩu của bạn</p>
        <p>Click vào link bên dưới để thay đổi mật khẩu!</p>
        <a class="reset_btn" href="{{ route('reset.password.get', $token) }}">CẬP NHẬT MẬT KHẨU</a>
        <div class="box_info">
            <p>
                <span>Nếu có vấn đề xin vui lòng liên hệ qua email: </span><a href="mailto:contact.beeswatch@gmail.com">contact.beeswatch@gmail.com</a>
            </p>
            <p><span>Hoặc qua số điện thoại: </span><a href="tel:0854643xxx">0854643xxx</a></p>
            <p>Copyright © 2023 S - Watch</p>
        </div>
    </div>
</div>
</body>
</html>
