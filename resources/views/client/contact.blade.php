@extends('layouts.guest')
@section('description'){{$page->description}}@endsection
@section('title'){{$page->title}}@endsection
@section('keywords'){{$page->keywords}}@endsection
@foreach ($page_meta as $val)
    @switch($val->meta_key)
        @case('map_iframe')
            @php $map = $val->meta_value @endphp
            @break
        @case('form_title')
            @php $form_title = $val->meta_value @endphp
            @break
        @case('form_des')
            @php $form_des = $val->meta_value @endphp
            @break
        @case('social_icon')
            @php $social_icon = json_decode($val->meta_value) @endphp
            @break
        @case('img_contact')
            @php $img_contact = $val->meta_value @endphp
            @break
        @case('site_title')
            @php $site_title = $val->meta_value @endphp
            @break
        @case('site_des')
            @php $site_des = $val->meta_value @endphp
            @break
    @endswitch
@endforeach
@section('content')
    <section class="section map">
        <iframe src="{{$map}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <section class="contact section">
            <div class="grid-container">
                <div class="grid-40">
                    <div class="section_heading" style="margin-bottom: 0;">
                        <h1 class="sec_title" style="margin-bottom: 0;">{{$site_title}}</h1>
                    </div>
                    <div class="contact_info">
                        <div class="item">
                            <h2 class="title">{{$site_des}}</h2>
                            <ul>
                                @foreach($social_icon as $social)
                                    <li>
                                        <a href="{{$social[1]->child_value->url}}" target="{{$social[1]->child_value->target}}">
                                            {!! App\Http\Controllers\Controller::get_img_attachment($social[0]->child_value)!!}
                                            <span>{{$social[1]->child_value->title}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="img">
                        {!! App\Http\Controllers\Controller::get_img_attachment($img_contact)!!}
                    </div>
                    </div>
                <div class="grid-55">
                    <h2 class="form_title">
                        {!! $form_title !!}
                    </h2>
                    <div class="form_des">
                        {!! $form_des !!}
                    </div>
                    <div role="form" class="contact_form">
                        <form action="/send-contact" method="post">
                            @csrf
                            <div class="form_group">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Họ và tên *">
                                <span class="unvalid">@error('name') {{$message}} @enderror</span>
                            </div>
                            <div class="form_group">
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Điện thoại">
                                <span class="unvalid">@error('phone ') {{$message}} @enderror</span>
                            </div>
                            <div class="form_group">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email *">
                                <span class="unvalid">@error('email') {{$message}} @enderror</span>
                            </div>
                            <div class="form_group">
                               <textarea name="message" rows="10"  placeholder="Nội dung *">{{ old('message') }}</textarea>
                                <span class="unvalid">@error('message') {{$message}} @enderror</span>
                            </div>
                            <div class="form_group">
                                <input type="submit" value="Gửi yêu cầu" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
