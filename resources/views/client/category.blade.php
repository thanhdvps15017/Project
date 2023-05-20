@extends('layouts.guest')
@section('description'){{$cat->description}}@endsection
@section('title'){{$cat->name}}@endsection
@section('keywords'){{$cat->keywords}}@endsection
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
        <div class="grid-container">
            <div class="grid-66">
                <div class="section_heading">
                    <div class="sec_title">
                        {{$cat->name}}
                    </div>
                    <div class="sec_des">
{{--                        {{$cat->description}}--}}
                    </div>
                </div>
                <div class="news_wrap">
                    {{-- Lấy tin tức--}}
                    @foreach($list_news as $new)
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
                                    {{$new->content}}
                                </div>
                                <div class="news_date">
                                    <span>{{$new->created_at}}</span>
                                    <a class="btn_small btn_secondary" href="{{url('/single-news/'.$new->slug)}}">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Phân trang--}}
                <div class="Page pagination m-auto">
                    <?php
                    $total = $list_news->total();
                    $pages = ceil($total / $list_news->perPage());
                    ?>
                    <ul class="pagination">
                        <li class="prev page-item">
                            <a class="page-link" href="{{$list_news->previousPageUrl()}}">
                                <i class="zmdi zmdi-chevron-left"></i>
                            </a>
                        </li>
                        @for($i = 1; $i <= $pages; $i++) <li
                            class="@if($list_news->currentPage() == $i)current @endif page-item">
                            <a class="page-link" @if($list_news->currentPage() != $i)href="{{$list_news->url($i)}}" @endif>
                                {{$i}}
                            </a>
                        </li>

                        @endfor
                        <li class="next page-item">
                            <a class="page-link" href="{{$list_news->nextPageUrl()}}">
                                <i class="zmdi zmdi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid-30">
                <div class="item">
                    <h4 class="item_head">
                        <i class="far fa-newspaper"></i> Danh mục tin
                    </h4>
                    <ul>
                        @foreach($news_cat as $item)
                            <li>
                                <a href="/news-category/{{$item->slug}}">{{$item->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
