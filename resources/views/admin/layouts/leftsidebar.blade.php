<!-- ========== Left Sidebar Start ========== -->
@php $user = auth()->user(); @endphp
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>

                <li class="has_sub">
                    <a href="/admin" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @role('Super-Admin')
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <span class="menu-arrow"></span>
                        <i class="zmdi zmdi-collection-item"></i>
                        <span> Trang </span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="/admin/pages">Danh sách trang</a></li>
                        <li><a href="/admin/option">Cài đặt chung</a></li>
                    </ul>
                </li>
                @endrole
                @can('form-contact')
                <li>
                    <a href="/admin/contact" class="waves-effect">
                        <i class="zmdi zmdi-email"></i>
                        <span> Form liên hệ </span>
                    </a>
                </li>
                @endcan
                @can('media')
                <li>
                    <a href="/admin/media" class="waves-effect">
                        <i class="zmdi zmdi-collection-image"></i>
                        <span> Hình ảnh </span>
                    </a>
                </li>
                @endcan
                {{-- <li class="text-muted menu-title">Tin Tức</li>--}}
                @if($user->hasAnyRole(['News-Full', 'Super-Admin']) ||
                $user->hasAnyDirectPermission(['news-list','news-category','news-comment'])
                )
                {{-- @hasanyrole('News|News Full|Super-Admin') --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        {{-- <span class="label label-pill label-warning float-right">8</span>--}}
                        <span class="menu-arrow"></span>
                        <i class="zmdi zmdi-collection-text"></i>
                        <span> Tin tức </span>
                    </a>
                    <ul class="list-unstyled">
                        @can('news-list')
                        <li><a href="/admin/news">Danh sách</a></li>
                        <li><a href="/admin/news/add">Thêm tin tức mới</a></li>
                        @endcan
                        @can('news-category')
                        <li><a href="/admin/news/categories">Danh mục tin tức</a></li>
                        @endcan
                        @can('news-comment')
                        <li><a href="{{route('admin.news.comment')}}">Bình luận tin tức</a></li>
                        @endcan
                    </ul>
                </li>
                {{-- @endhasanyrole --}}
                @endif


                {{-- <li class="text-muted menu-title">Sản phẩm</li>--}}
                @if($user->hasAnyRole(['Product-Full', 'Super-Admin']) ||
                $user->hasAnyDirectPermission(['product-list','product-category','product-comment','product-brand'])
                )
                <li class="has_sub">
                    <a href="javascript:void(0);" class="">
                        {{-- <span class="label label-pill label-warning float-right">8</span>--}}
                        <span class="menu-arrow"></span>
                        <i class="zmdi zmdi-timer"></i>
                        <span> Sản phẩm </span>
                    </a>
                    <ul class="list-unstyled">
                        @can('product-list')
                        <li><a href="/admin/products">Danh sách</a></li>
                        <li><a href="/admin/product/add">Thêm sản phẩm mới</a></li>
                        @endcan
                        @can('product-category')
                        <li><a href="/admin/product_categories">Danh mục sản phẩm</a></li>
                        @endcan
                        @can('product-brand')
                        <li><a href="/admin/brands">Thương hiệu</a></li>
                        @endcan
                        @can('product-comment')
                        <li><a href="{{route('product.comment')}}">Bình luận</a></li>
                        @endcan
                    </ul>
                </li>
                @endif
                {{-- <li class="text-muted menu-title">Đơn hàng</li>--}}
                @can('order')
                <li>
                    <a href="/admin/orders" class="waves-effect">
                        {{-- <span class="label label-pill label-warning float-right">8</span>--}}
                        {{-- <span class="menu-arrow"></span>--}}
                        <i class="zmdi zmdi-shopping-basket"></i>
                        <span> Đơn hàng </span>
                    </a>
                    {{-- <ul class="list-unstyled">--}}
                        {{-- <li><a href="/admin/users">Danh sách</a></li>--}}
                        {{-- <li><a href="/admin/users/add">Thêm người dùng mới</a></li>--}}
                        {{-- </ul>--}}
                </li>
                @endcan
                @can('coupon')
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <span class="menu-arrow"></span>
                        <i class="zmdi zmdi-ticket-star"></i>

                        <span> Mã giảm giá </span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="/admin/coupon">Danh sách mã</a></li>
                        <li><a href="/admin/coupon/add">Thêm mã mới</a></li>
                    </ul>
                </li>
                @endcan
                {{-- <li class="text-muted menu-title">Người dùng</li>--}}
                @role('Super-Admin')
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        {{-- <span class="label label-pill label-warning float-right">8</span>--}}
                        <span class="menu-arrow"></span>
                        <i class="zmdi zmdi-account"></i>
                        <span> Người dùng </span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.user')}}">Danh sách </a></li>
                        <li><a href="{{route('admin.user.role')}}">Vai trò </a></li>
                        <li><a href="{{route('admin.user.permission')}}">Quyền </a></li>
                    </ul>
                </li>
                @endrole

                {{-- <li class="has_sub">--}}
                    {{-- <a href="javascript:void(0);" class="waves-effect"><i
                            class="zmdi zmdi-blur-linear"></i><span>Multi Level </span> <span
                            class="menu-arrow"></span></a>--}}
                    {{-- <ul>--}}
                        {{-- <li class="has_sub">--}}
                            {{-- <a href="javascript:void(0);" class="waves-effect"><span>Menu Level 1.1</span> <span
                                    class="menu-arrow"></span> </a>--}}
                            {{-- <ul>--}}
                                {{-- <li><a href="javascript:void(0);"><span>Menu Item</span></a></li>--}}
                                {{-- <li><a href="javascript:void(0);"><span>Menu Item</span></a></li>--}}
                                {{-- <li><a href="javascript:void(0);"><span>Menu Item</span></a></li>--}}
                                {{-- </ul>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="javascript:void(0);"><span>Menu Level 1.2</span></a>--}}
                            {{-- </li>--}}
                        {{-- </ul>--}}
                    {{-- </li>--}}
                {{-- <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-format-clear-all"></i><span>
                        Sản Phẩm </span> <span class="menu-arrow"></span></a>--}}
                {{-- <ul class="list-unstyled">--}}
                    {{-- <li><a href="{{url('admin/products')}}">Danh sách </a></li>--}}
                    {{-- <li><a href="{{url('admin/categorys')}}">Danh mục sản phẩm</a></li>--}}
                    {{-- <li><a href="{{url('admin/brands')}}">Thương hiệu </a></li>--}}
                    {{-- </ul>--}}
                {{-- </li>--}}

                {{-- <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-format-clear-all"></i><span>
                        Sản Phẩm </span> <span class="menu-arrow"></span></a>--}}
                {{-- <ul class="list-unstyled">--}}
                    {{-- <li><a href="{{url('admin/products')}}">Danh sách </a></li>--}}
                    {{-- <li><a href="{{url('admin/categorys')}}">Danh mục sản phẩm</a></li>--}}
                    {{-- <li><a href="{{url('admin/brands')}}">Thương hiệu </a></li>--}}
                    {{-- </ul>--}}
                {{-- </li>--}}


            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->