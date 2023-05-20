@extends('layouts.admin')
@section('title')
    Quản lý hình ảnh
@endsection
@section('admin_content')
    <div class="popup_form_wrap">
        <form action="{{ route('admin.media.upload') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
            @csrf
            <label class="block mb-4">
{{--                <span class="file">Chọn tệp để tải lên</span>--}}
                <input type="file" name="image[]" multiple class="form-control" accept=".jpg, .jpeg, .png, .webp, .gif"/>
{{--                <input type="hidden">--}}
            </label>
            <button type="submit" class="btn btn-primary">Submit</button>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('image.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </form>
    </div>
    <div class="media_gallery">
        @foreach($medias as $img)
            <div class="img_wrap">
                <a class="show_full" href="/admin/media/img_full/{{$img->id}}">
                    <img src="{{asset($img->url)}}" alt="">
                </a>
            </div>
        @endforeach
    </div>
    <div id="popup_fullsize" class="popup_full">
        <div class="bg_dark"></div>
        <div class="img_inner">
            <div class="title">
                <h4>Chi tiết hình ảnh</h4>
                <div class="close_btn">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 9L9 15" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 15L9 9" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div class="img_wrap">
                <img src="" class="image_full">
            </div>
            <div class="img_info" id="img_info">

            </div>
        </div>
    </div>
    <div style="display:none;" id="hide"></div>
@endsection
