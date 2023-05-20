@extends('layouts.guest')
@section('description'){{$page->description}}@endsection
@section('title'){{$page->title}}@endsection
@section('keywords'){{$page->keywords}}@endsection
@section('banner'){{asset('images/banner_2.jpg')}}@endsection
@foreach ($page_meta as $val)
    @switch($val->meta_key)
        @case('title_sec_1')
            @php $title_sec_1 = $val->meta_value @endphp
            @break
        @case('bg_title_sec_1')
            @php $bg_title_sec_1 = $val->meta_value @endphp
            @break
        @case('des_sec_1')
            @php $des_sec_1 = $val->meta_value @endphp
            @break
        @case('choose_pd_sec_1')
            @php $choose_pd_sec_1 = json_decode($val->meta_value) @endphp
            @break
        @case('bg_img_sec_1')
            @php $bg_img_sec_1 = $val->meta_value @endphp
            @break
        @case('title_sec_2')
            @php $title_sec_2 = $val->meta_value @endphp
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
        @case('bg_title_sec_3')
            @php $bg_title_sec_3 = $val->meta_value @endphp
            @break
        @case('bg_img_sec_3')
            @php $bg_img_sec_3 = $val->meta_value @endphp
            @break
        @case('content_sec_3')
            @php $content_sec_3 = json_decode($val->meta_value) @endphp
            @break
        @case('title_sec_4')
            @php $title_sec_4 = $val->meta_value @endphp
            @break
        @case('bg_title_sec_4')
            @php $bg_title_sec_4 = $val->meta_value @endphp
            @break
        @case('des_sec_4')
            @php $des_sec_4 = $val->meta_value @endphp
            @break
        @case('content_sec_4')
            @php $content_sec_4 = json_decode($val->meta_value) @endphp
            @break
    @endswitch
@endforeach

@section('content')
    <section class="section about_1" style="background-image: url({!! App\Http\Controllers\Controller::get_img_url($bg_img_sec_1)!!});">
        <div class="grid-container">
            <div class="grid-100">
                <div class="section_heading text_center">
                    <div class="title_group">
                        @if(!empty($bg_title_sec_1))
                            <div class="bg_title">
                                {!! $bg_title_sec_1 !!}
                            </div>
                        @endif
                        @if(!empty($title_sec_1))
                            <h1 class="sec_title">{!! $title_sec_1 !!}</h1>
                        @endif
                    </div>
                    @if(!empty($des_sec_1))
                        <div class="sec_des">
                            {!! $des_sec_1 !!}
                        </div>
                    @endif
                </div>
            </div>
            <div class="grid-100">
                <div class="img_list_wrap">
                    <div class="img_wrap">
                        <a href="/single-product/">
                            {!! App\Http\Controllers\Controller::get_img_attachment(40)!!}
                        </a>
                    </div>
                    <div class="img_wrap">
                        <a href="/single-product/">
                            {!! App\Http\Controllers\Controller::get_img_attachment(41)!!}
                        </a>
                    </div>
                    <div class="img_wrap">
                        <a href="/single-product/">
                            {!! App\Http\Controllers\Controller::get_img_attachment(42)!!}
                        </a>
                    </div>
                    <div class="img_wrap">
                        <a href="/single-product/">
                            {!! App\Http\Controllers\Controller::get_img_attachment(43)!!}
                        </a>
                    </div>
                    <div class="img_wrap">
                        <a href="/single-product/">
                            {!! App\Http\Controllers\Controller::get_img_attachment(44)!!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section about_2">
        <div class="grid-container">
            <div class="section_heading">
                <div class="title_group text_center">
                    @if(!empty($bg_title_sec_2))
                        <div class="bg_title">
                            {!! $bg_title_sec_2 !!}
                        </div>
                    @endif
                    @if(!empty($title_sec_2))
                        <h2 class="sec_title">
                            <b>{!! $title_sec_2 !!}</b>
                        </h2>
                    @endif
                </div>
            </div>

            <div class="content_wrap">
                @foreach($content_sec_2 as $item)
                    <div class="item">
                        <div class="img_wrap">
                            {!! App\Http\Controllers\Controller::get_img_attachment($item[3]->child_value)!!}
                        </div>
                        <div class="cont_wrap">
                            <div class="sub_sec_title">
                                {!! $item[0]->child_value !!}
                            </div>
                            <h3 class="sec_title"><b>{!! $item[1]->child_value !!}</b></h3>
                            <div class="sec_des">
                                {!! $item[2]->child_value !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section about_3" style="background-image: url('https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Component-6.jpg')">
        <div class="grid-container">
            <div class="section_heading">
                <div class="text_center title_group">
                    @if(!empty($bg_title_sec_3))
                        <div class="bg_title">
                            {!! $bg_title_sec_3 !!}
                        </div>
                    @endif
                    @if(!empty($title_sec_3))
                        <h2 class="sec_title text_white">
                            <b>{!! $title_sec_3 !!}</b>
                        </h2>
                    @endif
                </div>
            </div>

            <div class="tabs_wrap">
                <img src="https://staging.canhcam.asia/harborland/wp-content/themes/canhcam/images/Ellipse_79.png" alt="">
                <ul class="tabs">
                    <li class="tab " data-id="0">
                        <img width="90" height="89" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Mask-group1.svg" class="" alt="" decoding="async" loading="lazy">                            </li>
                    <li class="tab active" data-id="1">
                        <img width="82" height="83" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Mask-group-2.svg" class="" alt="" decoding="async" loading="lazy">                            </li>
                    <li class="tab " data-id="2">
                        <img width="75" height="76" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Mask-group-1-1.svg" class="" alt="" decoding="async" loading="lazy">                            </li>
                </ul>
                <div class="tabs_content">
                    <div class="item " id="tab_0">
                        <div class="title text_white text_center">
                            Đối với khách hàng                                </div>
                        <div class="sec_des text_white text_center">
                            Cung cấp giải pháp, dịch vụ bất động sản toàn diện với chất lượng tốt nhất giúp khách hàng tiết kiệm thời gian và tối ưu chi phí.                                 </div>
                    </div>
                    <div class="item active" id="tab_1">
                        <div class="title text_white text_center">
                            Đối với khách hàng                                </div>
                        <div class="sec_des text_white text_center">
                            Cung cấp giải pháp, dịch vụ bất động sản toàn diện với chất lượng tốt nhất giúp khách hàng tiết kiệm thời gian và tối ưu chi phí.                                 </div>
                    </div>
                    <div class="item " id="tab_2">
                        <div class="title text_white text_center">
                            Đối với khách hàng                                </div>
                        <div class="sec_des text_white text_center">
                            Cung cấp giải pháp, dịch vụ bất động sản toàn diện với chất lượng tốt nhất giúp khách hàng tiết kiệm thời gian và tối ưu chi phí.                                 </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section about_4">
        <div class="about_4_content">
            <div class="section_heading">
                <div class="title_group">
                    @if(!empty($bg_title_sec_4))
                        <div class="bg_title">
                            {!! $bg_title_sec_4 !!}
                        </div>
                    @endif
                    @if(!empty($title_sec_4))
                        <h2 class="sec_title">
                            <b>{!! $title_sec_4 !!}</b>
                        </h2>
                    @endif
                    @if(!empty($des_sec_4))
                        <div class="sec_des">
                            {!! $des_sec_4 !!}
                        </div>
                    @endif
                </div>
            </div>

            <div class="swiper_wrap">
                <div class="swiper about_swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-e4e0d9dab0debf4c" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-980px, 0px, 0px);"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 306.667px; margin-right: 20px;" role="group" aria-label="1 / 3">
                            <div class="img_wrap">
                                <img width="338" height="510" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    01.
                                </div>
                                <h4 class="text_white">
                                    Dự án, mặt bằng có địa thế vàng                                        </h4>
                            </div>
                        </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 306.667px; margin-right: 20px;" role="group" aria-label="2 / 3">
                            <div class="img_wrap">
                                <img width="338" height="509" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    02.
                                </div>
                                <h4 class="text_white">
                                    Dịch vụ, uy tín và chất lượng                                        </h4>
                            </div>
                        </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="2" style="width: 306.667px; margin-right: 20px;" role="group" aria-label="3 / 3">
                            <div class="img_wrap">
                                <img width="338" height="509" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    03.
                                </div>
                                <h4 class="text_white">
                                    Song hành cùng khách hàng                                        </h4>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 306.667px; margin-right: 20px;" role="group" aria-label="1 / 3">
                            <div class="img_wrap">
                                <img width="338" height="510" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    01.
                                </div>
                                <h4 class="text_white">
                                    Dự án, mặt bằng có địa thế vàng                                        </h4>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 306.667px; margin-right: 20px;" role="group" aria-label="2 / 3">
                            <div class="img_wrap">
                                <img width="338" height="509" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    02.
                                </div>
                                <h4 class="text_white">
                                    Dịch vụ, uy tín và chất lượng                                        </h4>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="2" style="width: 306.667px; margin-right: 20px;" role="group" aria-label="3 / 3">
                            <div class="img_wrap">
                                <img width="338" height="509" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    03.
                                </div>
                                <h4 class="text_white">
                                    Song hành cùng khách hàng                                        </h4>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 306.667px; margin-right: 20px;" role="group" aria-label="1 / 3">
                            <div class="img_wrap">
                                <img width="338" height="510" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-797-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    01.
                                </div>
                                <h4 class="text_white">
                                    Dự án, mặt bằng có địa thế vàng                                        </h4>
                            </div>
                        </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 306.667px; margin-right: 20px;" role="group" aria-label="2 / 3">
                            <div class="img_wrap">
                                <img width="338" height="509" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-798-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    02.
                                </div>
                                <h4 class="text_white">
                                    Dịch vụ, uy tín và chất lượng                                        </h4>
                            </div>
                        </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 306.667px; margin-right: 20px;">
                            <div class="img_wrap">
                                <img width="338" height="509" src="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799.jpg" class="" alt="" decoding="async" loading="lazy" srcset="https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799.jpg 338w, https://staging.canhcam.asia/harborland/wp-content/uploads/2023/03/Rectangle-799-199x300.jpg 199w" sizes="(max-width: 338px) 100vw, 338px">                                    </div>
                            <div class="title_wrap">
                                <div class="count text_white">
                                    03.
                                </div>
                                <h4 class="text_white">
                                    Song hành cùng khách hàng                                        </h4>
                            </div>
                        </div></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                <div class="swiper_pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
            </div>
        </div>
    </section>
@endsection
