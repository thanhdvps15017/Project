@extends('layouts.admin')
@section('title')
    Chỉnh sửa coupon
@endsection
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Coupon</h4>
                    {{--                    <ol class="breadcrumb float-right">--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Uplon</a></li>--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>--}}
                    {{--                        <li class="breadcrumb-item active">Dashboard</li>--}}
                    {{--                    </ol>--}}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 m-auto">
                <h1 style="text-align: center; margin: 20px 0">Thêm coupon</h1>
                <form action="/admin/coupon/add" method="post" class="m-auto">
                    <div class="inner_form_wrap" style="display:flex; flex-wrap: wrap">
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="coupon_code">Mã giảm giá <span class="required">*</span></label>
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control" value="{{$coupon->coupon_code}}">
                            <span class="unvalid">@error('coupon_code') {{$message}} @enderror</span>
                        </div>
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="coupon_type">Loại giảm giá</label>
                            <select name="coupon_type" id="coupon_type" class="form-control">
                                <option value="0">Giảm theo %</option>
                                <option value="1">Giảm trực tiếp</option>
                            </select>
                        </div>
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="description">Mô tả</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{$coupon->description}}">
                        </div>
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="discount">Số tiền giảm <span class="required">*</span></label>
                            <input type="number" name="discount" id="discount" class="form-control" value="{{$coupon->discount}}">
                            <span class="unvalid">@error('discount') {{$message}} @enderror</span>
                        </div>
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="min_total">Đơn hàng tối thiểu <span class="required">*</span></label>
                            <input type="number" name="min_total" id="min_total" class="form-control" value="{{$coupon->min_total}}">
                            <span class="unvalid">@error('min_total') {{$message}} @enderror</span>
                        </div>
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="max_discount">Số tiền tối đa <span class="required">*</span></label>
                            <input type="number" name="max_discount" id="max_discount" class="form-control" value="{{$coupon->max_discount}}">
                            <span class="unvalid">@error('max_discount') {{$message}} @enderror</span>
                        </div>
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="quantity">Số lượng <span class="required">*</span></label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{$coupon->quantity}}">
                            <span class="unvalid">@error('quantity') {{$message}} @enderror</span>
                        </div>
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="date_start">Ngày bắt đầu <span class="required">*</span></label>
                            <input type="date" name="date_start" id="date_start" class="form-control" value="{{$coupon->date_start}}">
                            <span class="unvalid">@error('date_start') {{$message}} @enderror</span>
                        </div>
                        <div class="form_group mb-3 w-50 px-3">
                            <label for="date_expire">Ngày kết thúc <span class="required">*</span></label>
                            <input type="date" name="date_expire" id="date_expire" class="form-control" value="{{$coupon->date_expire}}">
                            <span class="unvalid">@error('date_expire') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="form_group mt-3 ml-3">
                        <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
