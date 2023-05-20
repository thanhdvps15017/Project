@extends('layouts.guest')
@section('title')
    Đăng nhập S - Watch
@endsection
@foreach($footer['footer_meta'] as $item)
    @switch($item->meta_key)
        @case('logo_page')
            @php $logo = $item->meta_value @endphp
            @break
    @endswitch
@endforeach
@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }

    a {
        font-size: 14px;
        line-height: 1.7;
        color: #666;
        margin: 0;
        transition: all .4s;
        -webkit-transition: all .4s;
        -o-transition: all .4s;
        -moz-transition: all .4s
    }

    a:focus {
        outline: none !important
    }

    a:hover {
        text-decoration: none;
        color: #57b846
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0
    }

    p {
        font-family: 'Montserrat';
        font-size: 13px;
        line-height: 1.7;
        color: #666;
        margin: 0;
        position: absolute;
        left: 15px;
        color: red
    }

    ul,
    li {
        margin: 0;
        list-style-type: none
    }

    input {
        outline: none;
        border: none
    }

    textarea {
        outline: none;
        border: none
    }

    textarea:focus,
    input:focus {
        border-color: transparent !important
    }

    input:focus::-webkit-input-placeholder {
        color: transparent
    }

    input:focus:-moz-placeholder {
        color: transparent
    }

    input:focus::-moz-placeholder {
        color: transparent
    }

    input:focus:-ms-input-placeholder {
        color: transparent
    }

    textarea:focus::-webkit-input-placeholder {
        color: transparent
    }

    textarea:focus:-moz-placeholder {
        color: transparent
    }

    textarea:focus::-moz-placeholder {
        color: transparent
    }

    textarea:focus:-ms-input-placeholder {
        color: transparent
    }

    input::-webkit-input-placeholder {
        color: #999
    }

    input:-moz-placeholder {
        color: #999
    }

    input::-moz-placeholder {
        color: #999
    }

    input:-ms-input-placeholder {
        color: #999
    }

    textarea::-webkit-input-placeholder {
        color: #999
    }

    textarea:-moz-placeholder {
        color: #999
    }

    textarea::-moz-placeholder {
        color: #999
    }

    textarea:-ms-input-placeholder {
        color: #999
    }

    button {
        outline: none !important;
        border: none;
        background: 0 0
    }

    button:hover {
        cursor: pointer
    }

    iframe {
        border: none !important
    }

    .txt2 {
        font-family: 'Montserrat';
        font-size: 13px;
        line-height: 1.5;
        color: #666
    }
    .wrap-login100 {
        margin: 0 auto;
        width: 960px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 80px 70px;
        position: relative;
        z-index: 10;
    }

    .login100-pic {
        width: 50%
    }

    .login100-pic img {
        max-width: 100%
    }

    .login100-form {
        width: 40%
    }

    .login100-form-title {
        font-size: 24px;
        color: #3155A6;
        line-height: 1.2;
        text-align: center;
        width: 100%;
        display: block;
        padding-bottom: 24px;
        font-weight: 700;
    }

    .wrap-input100 {
        position: relative;
        width: 100%;
        z-index: 1;
        margin-bottom: 25px;
    }

    .input100 {
        font-size: 15px;
        line-height: 1.5;
        color: #333333;
        display: block;
        width: 100%;
        background: rgb(139, 207, 236);
        height: 50px;
        border-radius: 25px;
        padding: 0 30px 0 68px;
        border: 1px solid rgb(139, 207, 236);
        transition: 0.3s ease-in-out;
    }

    .input100::placeholder{
        color: #FFF;
    }
    .input100:focus,
    .input100:focus-visible{
        background-color: #fff;
        border: 1px solid rgb(139, 207, 236) !important;
    }
    .input100:focus+p+span+span,
    .input100:focus-visible+p+span+span{
        color: #333333
    }
    .focus-input100 {
        display: block;
        position: absolute;
        border-radius: 25px;
        bottom: 0;
        left: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
        box-shadow: 0 0;
        color: rgba(87, 184, 70, .8)
    }

    .input100:focus+.focus-input100 {
        -webkit-animation: anim-shadow .5s ease-in-out forwards;
        animation: anim-shadow .5s ease-in-out forwards
    }

    @-webkit-keyframes anim-shadow {
        to {
            box-shadow: 0 0 70px 25px;
            opacity: 0
        }
    }

    @keyframes anim-shadow {
        to {
            box-shadow: 0 0 70px 25px;
            opacity: 0
        }
    }

    .symbol-input100 {
        font-size: 15px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        position: absolute;
        border-radius: 25px;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding-left: 35px;
        pointer-events: none;
        color: #FFF;
        -webkit-transition: all .4s;
        -o-transition: all .4s;
        -moz-transition: all .4s;
        transition: all .4s
    }

    .input100:focus+.focus-input100+.symbol-input100 {
        color: #57b846;
        padding-left: 28px
    }

    .container-login100-form-btn {
        width: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding-top: 20px
    }

    .login100-form-btn {
        font-size: 15px;
        line-height: 1.5;
        color: #fff;
        text-transform: uppercase;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        background: #3155A6;
        border: 1px solid #3155A6;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 25px;
        -webkit-transition: all .4s;
        -o-transition: all .4s;
        -moz-transition: all .4s;
        transition: all .4s;
        font-weight: 500;
    }

    .login100-form-btn:hover {
        background: transparent;
        color: #3155A6;
    }

    .validate-input {
        position: relative
    }

    @media(max-width: 992px) {
        .alert-validate::before {
            visibility: visible;
            opacity: 1
        }
    }

    section.login_page {
        height: 100vh;
        background-image: url({{asset(App\Http\Controllers\Controller::get_img_url(29))}});
        display: flex;
        align-items: center;
    }
    section.login_page:before{
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        position: absolute;
        content: '';
        left: 0;
        top: 0;
    }

    .text-center a {
        color: #333333;
        margin-bottom: 5px;
        margin-top: 3px;
        display: block;
        font-size: 14px;
    }
    .text-center a:hover{
        text-decoration: underline;
    }

    .text-center {
        text-align: center;

    }
    .banner_img,
    footer,
    header{
        display: none;
    }
    .wrap-input100.save_pass{
        font-size: 13px;
        display: flex;
        padding-left: 15px;
    }
    .wrap-input100.save_pass input{
        -webkit-appearance: button;
        margin-right: 10px;
    }
    .respon_invalid{
        font-weight: 600;
        font-size: 15px;
        color: red;
        margin-top: -15px;
        width: max-content;
        margin-left: 10px;
    }
    .logo_form{
        margin-bottom: 10px;
    }
    .logo_form img{
        margin: auto;
    }
    @media only screen and (max-width: 1199px) {
        .wrap-login100{
            width: 450px;
            padding: 60px 30px;
        }
        .login100-pic{
            display: none !important;
        }
        .login100-form{
            width: 100%;
        }
    }
    @media only screen and (max-width: 767px) {
        .wrap-login100{
            width:  100%;
        }
        .grid-container{
            width: 100%;
        }
    }
</style>
</head>

<body>
    <section class="section login_page">
        <div class="grid-container">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" style="display: flex; align-items: center; justify-content: center">
                    <img src="{{asset('/images/img-01.webp')}}" alt="IMG">
                </div>
                <form class="login100-form validate-form" action="{{ route('login.action') }}" method="post">
                    @csrf
                    <div class="logo_form">
                        <a href="{{url('/')}}">
                            {!!App\Http\Controllers\Controller::get_img_attachment($logo)!!}
                        </a>
                    </div>
                    <span class="login100-form-title">
                        Chào mừng đến với <br> S Watch
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input type="email" placeholder="Nhập email" class="input100" name="email" value="{{ old('email') }}">
                        <p>@error('email') {{$message}} @enderror</p>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" placeholder="Nhập mật khẩu" name="password">
                        <p>@error('password') {{$message}}@enderror</p>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 save_pass">
                        <input type="checkbox" name="remember" id="remember"><label for="remember">Nhớ mật khẩu</label>
                    </div>
                    @if(Session::has('fail')) <div class="respon_invalid">{{ session::get('fail') }}</div> @endif
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Đăng nhập
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <a class="txt2" href="{{ route('forget.password.get') }}">
                            Quên mật khẩu?
                        </a>
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{ route('register') }}">
                            Đăng ký tài khoản
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </section>

</body>
@endsection('content')
