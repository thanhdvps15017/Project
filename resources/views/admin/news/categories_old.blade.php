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
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-5">
                <h6>Thêm danh mục mới</h6>
                <hr>
                <form action="/admin/category/add" method="post" class="m-auto">
                    <div class="form_group mb-3">
                        <label for="name">Tên danh mục <span class="required">*</span></label>
                        <input name="name" id="name" class="form-control title_input" value="{{old('name')}}">
                        <span class="unvalid">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="form_group mb-3">
                        <label for="slug">Liên kết</label>
                        <input name="slug" id="slug" class="form-control slug_output" value="{{old('slug')}}">
                    </div>
                    <div class="form_group mb-3">
                        <label for="description">Mô tả</label>
                        <input name="description" id="description" class="form-control" value="{{old('description')}}">
                    </div>
                    <div class="form_group mb-3">
                        <label for="keywords">Từ khoá</label>
                        <input name="keywords" id="keywords" class="form-control" value="{{old('keywords')}}">
                    </div>
                    <div class="form_group mb-3">
                        <label for="image">Chọn ảnh</label>
                        <a href="/admin/media/popup" class="btn btn-primary text-white choose_img_btn" data-key="image">Chọn hình ảnh</a>
                        <img src="" class="image img_result">
                        <input type="hidden" name="image" class="image">
                    </div>
                    <div class="form_group mb-3">
                        <label for="appear">Hiện</label>
                        <input type="radio" name="appear" id="hide" value="1" checked>
                        <label for="appear">Ẩn</label>
                        <input type="radio" name="appear" id="appear" value="0">
                    </div>
                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="col-xl-7    ">
                <table class="table table-bordered mb-0 news_table">
                    <thead>
                    <tr>
                        <th><span>ID</span></th>
                        <th><span>Tên danh mục</span></th>
                        <th><span>Slug</span></th>
                        <th><span>Ngày đăng</span></th>
                        <th><span>Số bài viết</span></th>
                        <th><span>Ẩn / Hiện</span></th>
                        <th><span>Hành động</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cat_list as $cat)
                        <tr>
                            <th class="text-muted">{{$cat->id}}</th>
                            <td><a href="{{url('/news-category/'.$cat->slug)}}" target="_blank">{{$cat->name}}</a></td>
                            <td>{{$cat->slug}}</td>
                            <td>
                                    <span class="w_content">
                                        {{date('d-m-Y', strtotime($cat->created_at))}}
                                    </span>
                            </td>
                            <td class="text-center">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach($news as $item)
                                    @if($item->category_id  == $cat->id)
                                        @php
                                            $count ++;
                                        @endphp
                                    @endif
                                @endforeach
                                {{$count}}
                            </td>
                            <td class="text-center">
                                <a href="">
                                    @if($cat->appear == 0)
                                        <i class="zmdi zmdi-eye" style="font-size: 20px"></i>
                                    @else
                                        <i class="zmdi zmdi-eye-off" style="font-size: 20px"></i>
                                    @endif
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="mr-3" href="{{url('admin/category/update/'.$cat->id)}}">
                                    <i class="zmdi zmdi-edit" style="font-size: 20px"></i>
                                </a>
                                <a onclick="@if($count == 0)return confirm('Bạn có chắc chắn muốn xoá?')@else return alert('Danh mục này không thể xoá!')@endif" href="@if($count == 0){{url('admin/category/delete/'.$cat->id)}}@else javascript:void(0)@endif">
                                    <i class="zmdi zmdi-delete" style="font-size: 20px"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- container -->
@endsection
