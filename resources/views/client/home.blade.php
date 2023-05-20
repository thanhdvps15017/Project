@extends('layouts.guest')
@section('description'){{$page->description}}@endsection
@section('title'){{$page->title}}@endsection
@section('keywords'){{$page->keywords}}@endsection
@foreach ($page_meta as $val)
    @switch($val->meta_key)
        @case('banner_image')
            @php $banner_img = json_decode($val->meta_value) @endphp
            @break
        @case('title_sec_1')
            @php $title_sec_1 = $val->meta_value @endphp
            @break
        @case('des_sec_1')
            @php $des_sec_1 = $val->meta_value @endphp
            @break
        @case('bg_title_sec_1')
            @php $bg_title_sec_1 = $val->meta_value @endphp
            @break
        @case('bg_img_sec_1')
            @php $bg_img_sec_1 = $val->meta_value @endphp
            @break
        @case('title_sec_2')
            @php $title_sec_2 = $val->meta_value @endphp
            @break
        @case('des_sec_2')
            @php $des_sec_2 = $val->meta_value @endphp
            @break
        @case('bg_title_sec_2')
            @php $bg_title_sec_2 = $val->meta_value @endphp
            @break
        @case('content_sec_2')
            @php $content_sec_2 = json_decode($val->meta_value) @endphp
            @break
        @case('title_sec_3')
            @php $title_sec_3 = $val->meta_value @endphp
            @break
        @case('sub_title_sec_3')
            @php $sub_title_sec_3 = $val->meta_value @endphp
            @break
        @case('des_sec_3')
            @php $des_sec_3 = $val->meta_value @endphp
            @break
        @case('bg_img_sec_3')
            @php $bg_img_sec_3 = $val->meta_value @endphp
            @break
        @case('icons_sec_3')
            @php $icons_sec_3 = json_decode($val->meta_value) @endphp
            @break
        @case('link_sec_3')
            @php $link_sec_3 = json_decode($val->meta_value) @endphp
            @break
        @case('title_sec_4')
            @php $title_sec_4 = $val->meta_value @endphp
            @break
        @case('des_sec_4')
            @php $des_sec_4 = $val->meta_value @endphp
            @break
        @case('bg_title_sec_4')
            @php $bg_title_sec_4 = $val->meta_value @endphp
            @break
        @case('title_sec_5')
            @php $title_sec_5 = $val->meta_value @endphp
            @break
        @case('des_sec_5')
            @php $des_sec_5 = $val->meta_value @endphp
            @break
        @case('bg_title_sec_5')
            @php $bg_title_sec_5 = $val->meta_value @endphp
            @break
    @endswitch
@endforeach
@section('content')
<style>
    h3 {
        margin: 0;
    }
</style>
<section class="section home_1">
    <div class="swiper homeBannerSwiper">
        <div class="swiper-wrapper">
            @foreach($banner_img as $key => $img)
            <div class="swiper-slide">
                <div class="banner_img_wrap">
                    {!! App\Http\Controllers\Controller::get_img_attachment($img)!!}
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<section class="section home_2"
    style="background-image: url('{{asset(App\Http\Controllers\Controller::get_img_url($bg_img_sec_1))}}')">
    <div class="grid-container">
        <div class="section_heading text_center" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
            <div class="title_group">
                <div class="bg_title">{{$bg_title_sec_1}}</div>
                <h2 class="sec_title">{{$title_sec_1}}</h2>
            </div>
            <div class="sec_des">
                {{$des_sec_1}}
            </div>
        </div>
        <div class="home_prod_wrap" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
            {{-- Hiện sản phẩm--}}
            @foreach($products as $item)
                @php $img = json_decode($item->images) @endphp
            <div class="item">
                <a title="{{$item->name}}" href="{{url('single-product/'.$item->slug)}}">
                    <div class="img_wrap">
                        {!! App\Http\Controllers\Controller::get_img_attachment($img[0])!!}
                        <div class="home_prod_cont">
                            <p>{!! $item->description !!}</p>
                            <svg width="51" height="51" viewBox="0 0 51 51" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M25.34 49.6479C38.8604 49.6479 49.8207 38.6875 49.8207 25.1672C49.8207 11.6469 38.8604 0.686523 25.34 0.686523C11.8197 0.686523 0.859375 11.6469 0.859375 25.1672C0.859375 38.6875 11.8197 49.6479 25.34 49.6479Z"
                                    stroke="white"></path>
                                <line x1="16.2773" y1="24.6675" x2="34.4013" y2="24.6675" stroke="white"
                                    stroke-linecap="round"></line>
                                <line x1="24.8398" y1="34.229" x2="24.8398" y2="16.105" stroke="white"
                                    stroke-linecap="round"></line>
                            </svg>
                        </div>
                    </div>
                    <div class="home_prod_name">
                        {{$item->name}}
                    </div>
                </a>
            </div>
            @endforeach
            <div id="view_more_prod" class="btn_primary">
                Xem thêm
            </div>
        </div>
    </div>
</section>
<section class="home_3">
    <div class="grid-container">
        <div class="section_heading text_center" data-aos="fade-up">
            <div class="title_group">
                <div class="bg_title">{{$bg_title_sec_2}}</div>
                <h1 class="sec_title">{{$title_sec_2}}</h1>
            </div>
            <div class="sec_des">
                {{$des_sec_2}}
            </div>
        </div>
        <div class="list_item">
            @foreach($content_sec_2 as $key => $item)
            <div class="item" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                <div class="item_cont">
                    <div class="count">0{{$key + 1}}</div>
                    <h3 class="item_title">{{$item[0]->child_value}}</h3>
                    <div class="item_des">{{$item[1]->child_value}}</div>
                </div>
                <div class="item_img">
                    {!! App\Http\Controllers\Controller::get_img_attachment($item[2]->child_value)!!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="section home_4"
    style="background-image: url('{{asset(App\Http\Controllers\Controller::get_img_url($bg_img_sec_3))}}')">
    <div class="grid-container">
        <div class="grid-50 tablet-grid-100 mobile-grid-100" data-aos="fade-right" data-aos-duration="500" data-aos-delay="300">
            <div class="content_wrap">
                <h2 class="sec_title">{{$title_sec_3}}</h2>
                <div class="sec_sub_title">{{$sub_title_sec_3}}</div>
                <div class="sec_cont">
                    {!!$des_sec_3!!}
                </div>
                <a title="{{$link_sec_3->title}}" href="{{$link_sec_3->url}}" target="{{$link_sec_3->target}}"
                    class="btn btn_primary">{{$link_sec_3->title}}</a>
            </div>
        </div>
        <div class="grid-50 tablet-grid-100 mobile-grid-100">
            <div class="list_bubble">
                @foreach($icons_sec_3 as $icon)
                <div class="item_bubble" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                    {!! App\Http\Controllers\Controller::get_img_attachment($icon)!!}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="section home_5">
    <div class="grid-container">
        <div class="section_heading text_center" data-aos="fade-up">
            <div class="title_group">
                <div class="bg_title">{{$bg_title_sec_4}}</div>
                <h2 class="sec_title">{{$title_sec_4}}</h2>
            </div>
            <div class="sec_des">
                {{$des_sec_4}}
            </div>
        </div>
        <div class="home_news_wrap">
            {{-- Hiện tin tức --}}
            @foreach($news as $j => $item)
            <div class="item">
                <div class="img_wrap">
                    <a title="{{$item->title}}" href="{{route('single-news',[$item->slug])}}">
                        {!! App\Http\Controllers\Controller::get_img_attachment($item->image)!!}
                    </a>
                </div>
                <div class="item_cont">
                    <div class="title">
                        <h4><a href="{{route('single-news',[$item->slug])}}">{{$item->title}}</a></h4>
                    </div>
                    <div class="date">
                        <span>
                            {{date('d/m/Y' , strtotime($item->created_at))}}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="section home_6">
    <div class="grid-container">
        <div class="section_heading text_center">
            <div class="title_group">
                <div class="bg_title">{{$bg_title_sec_5}}</div>
                <h2 class="sec_title">{{$title_sec_5}}</h2>
            </div>
            <div class="sec_des">
                {{$des_sec_5}}
            </div>
        </div>
        <div class="swiper brandSwiper">
            <div class="swiper-wrapper">
                @foreach($brands as $item)
                <div class="swiper-slide">
                    <a title="{{$item->name}}" href="{{url('/brand/'.$item->slug)}}">
                         {!! App\Http\Controllers\Controller::get_img_attachment($item->image)!!}
{{--                        <img src="{{asset($item->image)}}" alt="">--}}
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
@endsection
