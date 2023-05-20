@foreach($footer['footer_meta'] as $item)
    @switch($item->meta_key)
        @case('favicon')
            @php $favicon = $item->meta_value @endphp
            @break
    @endswitch
@endforeach
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">

<meta property="og:title" content="@yield('title')">
<meta property="og:description" content="@yield('description')">
<meta property="og:url" content="{{url()->full()}}">
<meta property="og:site_name" content="S WATCH">
{{--<meta property="og:type" content="">--}}{{--Loại trang: website/article--}}
{{--<meta property="og:image" content="">--}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<link rel="icon" href="{{asset(App\Http\Controllers\Controller::get_img_url($favicon))}}">
<link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/unsematic.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/stylesheet.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/frontend.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/imagehover.css')}}">
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<title>@yield('title')</title>
@livewireStyles
