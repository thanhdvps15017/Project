@extends('layouts.guest')
@section('description'){{$page->description}}@endsection
@section('title'){{$page->title}}@endsection
@section('keywords'){{$page->keywords}}@endsection
@foreach ($page_meta as $val)
    @switch($val->meta_key)
        @case('link_fanpage')
            @php $link_fanpage = $val->meta_value @endphp
            @break
        @case('news_page_title')
            @php $news_page_title = $val->meta_value @endphp
            @break
        @case('news_page_des')
            @php $news_page_des = $val->meta_value @endphp
            @break
        @case('banner_image')
            @php $banner_image = $val->meta_value @endphp
            @break
    @endswitch
@endforeach
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
@section('content')
<section class="section news_sec">
    <div class="section_heading">
        <div class="title_group text_center">
            <div class="bg_title">
                NEWS
            </div>
            <div class="sec_title">
                {{$news_page_title}}
            </div>
            <div class="sec_des">
                {{$news_page_des}}
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-66 tablet-grid-66 mobile-grid-100">
            <div class="news_wrap">
                {{-- Lấy tin tức--}}
                @foreach($news as $new)
                    <div class="news_item">
                        <div class="img_wrap">
                            <a href="{{url('/single-news/'.$new->slug)}}">
                                {!! App\Http\Controllers\Controller::get_img_attachment($new->image)!!}
                            </a>
                        </div>
                        <div class="news_cont">
                            <div class="news_title">
                                <a href="{{url('/single-news/'.$new->slug)}}">{{$new->title}}</a>
                            </div>
                            <div class="news_des">
                                {!! $new->summary !!}
                            </div>
                            <div class="news_date">
                                <span>{{$new->created_at}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Phân trang--}}
            <div class="Page pagination m-auto">
                <?php
                $total = $news->total();
                $pages = ceil($total / $news->perPage());
                ?>
                <ul class="pagination">
                    <li class="prev page-item">
                        <a class="page-link" href="{{$news->previousPageUrl()}}">
                            <i class="zmdi zmdi-chevron-left"></i>
                        </a>
                    </li>
                    @for($i = 1; $i <= $pages; $i++) <li
                        class="@if($news->currentPage() == $i)current @endif page-item">
                        <a class="page-link" @if($news->currentPage() != $i)href="{{$news->url($i)}}" @endif>
                            {{$i}}
                        </a>
                        </li>

                        @endfor
                        <li class="next page-item">
                            <a class="page-link" href="{{$news->nextPageUrl()}}">
                                <i class="zmdi zmdi-chevron-right"></i>

                            </a>
                        </li>
                </ul>
            </div>
        </div>
        <div class="grid-30 tablet-grid-30 mobile-grid-100">
            <div class="item">
                <h4 class="item_head">
                     Danh mục tin tức
                </h4>
                <ul>
                    @foreach($cat as $item)
                    <li>
                        <a href="{{url('/news-category/'.$item->slug)}}">
                            <span>{{$item->name}}</span>
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.625 0.8125L5.3125 5.5L0.625 10.1875" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="item">
                <h4 class="item_head">
                     Tin tức nổi bật
                </h4>
                <ul>
                    @foreach($hot_news as $item)
                    <li>
                        <a href="{{url('/single-news/'.$item->slug)}}">
                            <span>
                                {{$item->title}}
                            </span>
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.625 0.8125L5.3125 5.5L0.625 10.1875" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
