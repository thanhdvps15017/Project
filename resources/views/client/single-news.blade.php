@extends('layouts.guest')
@section('description'){{$kq->summary}}@endsection
@section('title'){{$kq->title}}@endsection
@section('keywords'){{$kq->keywords}}@endsection
@foreach($footer['footer_meta'] as $item)
    @switch($item->meta_key)
        @case('default_banner')
            @php $default_banner = $item->meta_value @endphp
            @break
    @endswitch
@endforeach
@if(empty($banner_image))
    @php $banner_image = $default_banner @endphp
@endif
@section('banner'){{asset(App\Http\Controllers\Controller::get_img_url($banner_image))}}@endsection
@push('styles')
@endpush
@section('content')
        <section class="section post_detail">
            <div class="grid-container">
                <div class="grid-66 tablet-grid-75 mobile-grid-100">
                    <div class="title_group">
                        <h2 class="title_news">
                            {{$kq->title}}
                        </h2>
            </div>

            <div class="nav">
                <div class="day-view">
                    <div class="day">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M16.25 3.125H3.75C3.40482 3.125 3.125 3.40482 3.125 3.75V16.25C3.125 16.5952 3.40482 16.875 3.75 16.875H16.25C16.5952 16.875 16.875 16.5952 16.875 16.25V3.75C16.875 3.40482 16.5952 3.125 16.25 3.125Z"
                                stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M13.75 1.875V4.375" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M6.25 1.875V4.375" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M3.125 6.875H16.875" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                                <p class="day">
                                    <?=date('d - m - Y' , strtotime($kq->created_at)) ?>
                                </p>
                            </div>

                        </div>

                        <div class="share">
						<span>
							Chia sẻ
						</span>
                            <ul>
                                <li>
                                    <a href="http://www.facebook.com/sharer.php?u={{$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']}}" target="_blank">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.75 8.25H14.25C13.6533 8.25 13.081 8.48705 12.659 8.90901C12.2371 9.33097 12 9.90326 12 10.5V21" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9 13.5H15" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://twitter.com/share?text={{$kq->title}}url={{$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']}}" target="_blank">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.5006 5.68726C21.6841 6.85618 20.6655 7.8699 19.4926 8.68066L19.4926 8.68065C19.4183 10.731 18.8198 12.7282 17.7541 14.4814C16.6884 16.2347 15.1911 17.6855 13.4052 18.6955C11.6192 19.7054 9.60418 20.2407 7.55247 20.2502C5.50076 20.2598 3.48084 19.7433 1.68555 18.75L1.68616 18.7489C4.03051 18.7165 6.31343 17.9946 8.25024 16.6732L8.25016 16.6734C6.17689 15.2603 4.59782 13.2338 3.73433 10.878C2.87084 8.52226 2.76623 5.95533 3.43517 3.53711L3.43513 3.53713C4.39323 5.01262 5.66407 6.25938 7.15762 7.18907C8.65117 8.11876 10.3309 8.70864 12.0778 8.91693L12.0775 8.91698C11.8936 8.04005 12.0296 7.12624 12.461 6.34092C12.8924 5.5556 13.5907 4.95066 14.4295 4.63559C15.2683 4.32052 16.1922 4.31613 17.034 4.62322C17.8757 4.93031 18.5797 5.52858 19.0186 6.30976L19.0186 6.31018C20.2036 6.27481 21.3769 6.06492 22.5006 5.68726" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']}}title={{$kq->title}}source=S_WATCH" target="_blank">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.5 3.75H4.5C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08579 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08579 19.9142 3.75 19.5 3.75Z" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M11.25 10.5V16.5" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8.25 10.5V16.5" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8.25 8.34375C8.71599 8.34375 9.09375 7.96599 9.09375 7.5C9.09375 7.03401 8.71599 6.65625 8.25 6.65625C7.78401 6.65625 7.40625 7.03401 7.40625 7.5C7.40625 7.96599 7.78401 8.34375 8.25 8.34375Z" fill="#272D35"></path>
                                            <path d="M11.25 13.125C11.25 12.4288 11.5266 11.7611 12.0188 11.2688C12.5111 10.7766 13.1788 10.5 13.875 10.5C14.5712 10.5 15.2389 10.7766 15.7312 11.2688C16.2234 11.7611 16.5 12.4288 16.5 13.125V16.5" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>

                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="single_post_excerpt">
                        {{$kq->summary}}
                    </div>
                    <div class="mota wrap_content">
                        {!! $kq->content !!}
                    </div>
                    <div class="tags">
                        <span>Thẻ:</span>
                        <ul>
                            <li class="tag"><a href="http://127.0.0.1:8000/shop">LONGINES ELEGANT L4.910.4.11.6</a></li>
                            <li class="tag"><a href="http://127.0.0.1:8000/shop">LONGINES L2.673.4.78.6</a></li>
                        </ul>
                    </div>
                    @if(Auth::check())
                        <div class="comments">
                            @livewire('news-comment-component', ['news_id'=> (int)$kq->id])
                        </div>
                    @else
                        <div class="text_center">
                            <h4>Bạn cần đăng nhập để thực hiện chức năng bình luận</h4>
                        </div>
                    @endif
                </div>
                <div class="grid-25 tablet-grid-25 mobile-grid-100">
                    <div class="cat_td more_post">
                        <h3 class="text_up">
                            Tin tức liên quan
                        </h3>
                        <div class="wrap">
                            @foreach($list as $new)
                                <div class="item">
                                    <a href="{{url('single-news/'.$new->slug)}}" class="style_center max">
                                        <div class="item_img">
                                            {!! App\Http\Controllers\Controller::get_img_attachment($new->image)!!}
                                        </div>
                                        <div class="item_cont">
                                            <h3>{{$new->title}}</h3>
                                            <div class="date_line">
                                                <span><?=date('d - m - Y' , strtotime($new->created_at)) ?></span>
                                                <svg width="26" height="25" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org 000/svg">
                                                    <path d="M7.30469 22.5H37.2075" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M24.9746 9.84375L37.2076 22.5L24.9746 35.1562" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section another_posts">
            <div class="grid-container">
                <div class="section_heading">
                    <div class="sec_title">
                        Tin tức khác
                    </div>
                </div>
                <div class="box_swiper">
                    <div class="swiper postDetailSwiper">
                        <div class="swiper-wrapper">
                            @foreach($list as $kq)
                                <div class="swiper-slide">
                                    <a href="{{url('single-news/'.$kq->slug)}}">
                                        <div class="home_swiper_img">
                                            {!! App\Http\Controllers\Controller::get_img_attachment($kq->image)!!}
{{--                                            <img src="{{asset($kq->image)}}">--}}
                                        </div>
                                        <div class="item_cont">
                                            <div class="date">
                                                <div class="day">
                                                    <span><?=date('d' , strtotime($kq->created_at)) ?></span>
                                                </div>
                                                <div class="mY">
                                                    <span><?=date('m/Y' , strtotime($kq->created_at)) ?></span>
                                                </div>
                                            </div>
                                            <div class="name" href="#">
                                                {{$kq->title}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    <div class="outside-btn prev">
                        <svg width="25" height="48" viewBox="0 0 25 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.25 47.125L1.125 24L24.25 0.875" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="outside-btn next">
                        <svg width="25" height="48" viewBox="0 0 25 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.75 0.875L23.875 24L0.75 47.125" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
            </div>
        </div>
    </div>

</section>
@endsection
