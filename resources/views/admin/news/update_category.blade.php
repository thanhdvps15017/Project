@extends('layouts.admin')
@section('title')
    Danh mục tin tức
@endsection
@section('admin_content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Danh mục tin tức</h4>

                    {{--                    <ol class="breadcrumb float-right">--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Uplon</a></li>--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>--}}
                    {{--                        <li class="breadcrumb-item active">Dashboard</li>--}}
                    {{--                    </ol>--}}

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-8 m-auto">
                <h1 class="text-center">Cập nhật danh mục {{$cat->name}}</h1>
                <form action="/admin/category/update/{{$cat->id}}" method="post" class="m-auto">
                    <div class="form_group mb-3">
                        <label for="name">Tên danh mục <span class="required">*</span></label>
                        <input name="name" id="name" class="form-control title_input" value="{{$cat->name}}">
                        <span class="unvalid">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="form_group mb-3">
                        <label for="slug">Liên kết</label>
                        <input name="slug" id="slug" class="form-control slug_output" value="{{$cat->slug}}">
                    </div>
                    <div class="form_group mb-3">
                        <label for="description">Mô tả</label>
                        <input name="description" id="description" class="form-control" value="{{$cat->description}}">
                    </div>
                    <div class="form_group mb-3">
                        <label for="keywords">Từ khoá</label>
                        <input name="keywords" id="keywords" class="form-control" value="{{$cat->keywords}}">
                    </div>
                    <div class="form_group mb-3">
                        <label for="image">Chọn ảnh</label>
                        <a href="/admin/media/popup" class="btn btn-primary text-white choose_img_btn" data-key="image">Chọn hình ảnh</a>
                        <img src="{!! asset(App\Http\Controllers\Controller::get_img_url($cat->image))!!}" class="image img_result">
                        <input type="hidden" name="image" value="{{$cat->image}}">
                    </div>
                    <div class="form_group mb-3">
                        <label for="appear">Hiện</label>
                        <input type="radio" name="appear" id="hide" value="1" @if($cat->appear == 1) checked @endif>
                        <label for="appear">Ẩn</label>
                        <input type="radio" name="appear" id="appear" value="0" @if($cat->appear == 0) checked @endif>
                    </div>
                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>

    </div> <!-- container -->
@endsection
