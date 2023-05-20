@extends('layouts.guest')
@section('title')
    Cập nhật mật khẩu mới
@endsection
@section('content')
<style>
    .banner_img,
    footer,
    header{
        display: none;
    }
    section.forget_page {
        height: 100vh;
        background-image: url({{asset(App\Http\Controllers\Controller::get_img_url(29))}});
        display: flex;
        align-items: center;
    }
    section.forget_page:before{
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        position: absolute;
        content: '';
        left: 0;
        top: 0;
    }
    .form_forget{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        width: 500px;
    }
    input{
        outline: none !important;
        width: 100%;
        height: 50px;
        border: 1px solid #e0e0e0;
        margin-top: 10px;
        padding: 0 20px;
        border-radius: 5px;
        font-size: 16px;
        text-align: left;
        margin-bottom: 10px;
    }
    .form-forget{
        margin-bottom: 20px;

    }
    button{
        margin-top: 10px;
        cursor: pointer;
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
    button:hover{
        background: transparent;
        color: #3155A6;
    }
    h1{
        text-transform: uppercase;
        font-size: 36px;
        margin-bottom: 10px;
        color: #3155A6
    }
    .sec_des{
        margin-bottom: 20px;
    }
    .respond_invalid{
        color: red;
        font-weight: 500;
        font-size: 14px;
        text-align: left;
        padding-left: 5px;
        display: block;
    }
    .respond_valid{
        color: #568a04;
        font-weight: 600;
        font-size: 15px;
        text-align: center;
        display: block;
    }
</style>
<section class="section forget_page">
    <div class="form_forget">
        <h1 class="text_center">Quên mật khẩu</h1>
        <form action="{{ route('reset.password.post') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-forget">
            <div class="input_wrap">
                <input type="text" id="email_address" class="form-control" placeholder="Nhập email của bạn" name="email" required autofocus>
                @if ($errors->has('email'))
                    <span class="respond_invalid">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="input_wrap">
                <input type="password" id="password" class="form-control" placeholder="Nhập mật khẩu mới" name="password" required autofocus>
                @if ($errors->has('password'))
                    <span class="respond_invalid">{{ $errors->first('password') }}</span>
                @endif

            </div>
            <div class="input_wrap">
                <input type="password" id="password-confirm" class="form-control" placeholder="Xác nhận mật khẩu" name="password_confirmation" required autofocus>
                @if ($errors->has('password_confirmation'))
                    <span class="respond_invalid">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <button type="submit">Đặt lại  mật  khẩu</button>
        </div>
    </form>
    </div>
</section>
@endsection
