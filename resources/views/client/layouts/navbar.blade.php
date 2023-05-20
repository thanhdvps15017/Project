@foreach($footer['footer_meta'] as $item)
    @switch($item->meta_key)
        @case('logo_page')
            @php $logo = $item->meta_value @endphp
            @break
    @endswitch
@endforeach
<div class="inside_header grid-container">
  <div class="wrap_search_popup text_center">
    <div class="bg_close"></div>
    <div class="inner">
      <div class="button_close">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
          <path
            d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z">
          </path>
        </svg>
      </div>
      @livewire('nav-search-component')
    </div>
  </div>
  <div class="logo">
    <a href="{{url('/')}}" title="Back to home">
        {!! App\Http\Controllers\Controller::get_img_attachment($logo) !!}
    </a>
  </div>
  <div class="primary_menu">
    <ul>
      <li class="@if(Request::is('/')) active @endif"><a href="/">Trang chủ</a></li>
        <li class="@if(str_contains($_SERVER['REQUEST_URI'], 'about')) active @endif"><a href="{{url('/about')}}">Về chúng tôi</a></li>
        <li class="@if(str_contains($_SERVER['REQUEST_URI'], 'product') || str_contains($_SERVER['REQUEST_URI'], 'shop')) active @endif"><a href="{{url('/shop')}}">Sản phẩm</a></li>
      <li class="@if(str_contains($_SERVER['REQUEST_URI'], 'news')) active @endif"><a href="{{url('/news')}}">Tin tức</a></li>
      <li class="@if(str_contains($_SERVER['REQUEST_URI'], 'contact')) active @endif"><a href="{{url('/contact')}}">Liên hệ</a></li>
    </ul>
  </div>
  <div class="header_actions">
    <ul>
      <li class="search search_item search_open"><i class="fas fa-search"></i></li>
      <li><a href="{{ route('showCart') }}" title="View Cart"><i class="fas fa-shopping-cart"></i></a></li>
      <li class="login_dropdown" data-url="@if(Auth::check()){{url('/profile')}}@else{{url('/login')}}@endif">
        <i class="far fa-user login_form"></i>
      </li>
    </ul>
    <div class="hamburger open_menu">
      <span class="burger_line"></span>
      <span class="burger_line"></span>
      <span class="burger_line"></span>
    </div>
  </div>
</div>
<div class="login_box">
  @if(Auth::check())
  <div class="user_info">
    <div class="user_name">
      <h5>{{ $user = Auth::user()->name }}</h5>
      <span> {{$user = Auth::user()->email}}</span>
    </div>
  </div>
  <div class="user_link">
    <ul>
      <li><a href="{{ route('profile') }}">Thay đổi thông tin</a></li>
      <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
    </ul>
  </div>
  @else
  <form id="login_box" action="{{ route('login.action') }}" method="post">
    @csrf
    <h4>Đăng nhập</h4>
      <div class="form_group">
          <input type="email" placeholder="Enter mail" name="email" value="{{ old('email') }}">
      </div>
      <div class="form_group">
          <input type="password" placeholder="Enter Password" name="password">
          <a href="{{ route('forget.password.get') }}">Quên?</a>
      </div>
    <input type="submit" class="btn_small btn_secondary" value="Đăng nhập">
    <a href="{{ route('register') }}">Tạo tài khoản</a>
  </form>
  @endif
  <span class="close_logn_form"><i class="fas fa-times"></i></span>
</div>
