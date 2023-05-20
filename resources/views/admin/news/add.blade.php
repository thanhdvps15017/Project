@extends('layouts.admin')
@section('title')
Thêm tin tức mới
@endsection
@section('admin_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Tin tức</h4>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 m-auto">
            <h1 style="text-align: center; margin: 20px 0">Thêm tin tức</h1>
            <form action="/admin/news/add" method="post" class="m-auto">
                <div class="form_group mb-3">
                    <label for="title">Tiêu đề tin <span class="required">*</span></label>
                    <input name="title" id="title" class="form-control title_input" value="{{old('title')}}">
                    <span class="unvalid">@error('title') {{$message}} @enderror</span>
                </div>
                <div class="form_group mb-3">
                    <label for="slug">Slug</label>
                    <input name="slug" id="slug" class="form-control slug_output" value="{{old('slug')}}">
                </div>
                <div class="form_group mb-3 image_input">
                    <label for="image">Chọn ảnh <span class="required">*</span></label>
                    <a href="/admin/media/popup" class="btn btn-primary text-white choose_img_btn" data-key="image">Chọn
                        hình ảnh</a>
                    <img src="" class="image img_result">
                    <input type="hidden" name="image" value="" class="image">
                    <span class="unvalid">@error('image') {{$message}} @enderror</span>
                </div>
                <div class="form_group mb-3">
                    <label for="summary">Tóm tắt</label>
                    <textarea name="summary" id="summary" class="form-control">{{old('summary')}}</textarea>
                </div>
                <div class="form_group mb-3">
                    <label for="content">Nội dung tin <span class="required">*</span></label>
                    <textarea name="content" id="content" rows="10" class="form-control">{{old('content')}}</textarea>
                    <span class="unvalid">@error('content') {{$message}} @enderror</span>
                </div>
                <div class="form_group mb-3">
                    <label for="keywords">Từ khoá SEO</label>
                    <textarea name="keywords" id="keywords" class="form-control">{{old('keywords')}}</textarea>
                </div>
                <div class="form_group mb-3">
                    <label for="category_id">Loại tin</label>
                    <select name="category_id" id="category_id" class="form-control" value="{{old('category_id')}}">
                        @foreach($cat as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form_group mb-3">
                    <label for="hot">Tin nổi bật</label>
                    <input type="radio" name="hot" id="hot" value="1">
                    <label for="not_hot">Không nổi bật</label>
                    <input type="radio" name="hot" id="not_hot" value="0" checked>
                </div>
                <div class="form_group mb-3">
                    <label for="appear">Hiện</label>
                    <input type="radio" name="appear" id="hide" value="1" checked>
                    <label for="appear">Ẩn</label>
                    <input type="radio" name="appear" id="appear" value="0">
                </div>
                <div class="form_group">
                    <button type="submit" class="px-3 btn btn-primary">Thêm tin</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
