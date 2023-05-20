@extends('layouts.admin')
@section('title')
Danh sách tin tức
@endsection
@section('admin_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Tin tức</h4>

                {{-- <ol class="breadcrumb float-right">--}}
                    {{-- <li class="breadcrumb-item"><a href="#">Uplon</a></li>--}}
                    {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li>--}}
                    {{-- <li class="breadcrumb-item active">Dashboard</li>--}}
                    {{-- </ol>--}}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="card mb-3">
        <div class="card-header">
            <strong>Tìm kiếm tin tức</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="search" class="form-control" placeholder="Nhập tiêu đề bài viết">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">Tất Cả Danh Mục</option>
                            @foreach($cat_list as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select id="appear" name="appear" class="form-control">
                            <option value="">Tất Cả Trạng Thái</option>
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển Thị</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select id="hot" name="hot" class="form-control">
                            <option value="">Tất Cả Tin Tức Nổi Bật</option>
                            <option value="1">Nổi Bật</option>
                            <option value="0">Không Nổi Bật</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">

    <div class="Page navigation m-auto">
        <?php
        $total = $news_list->total();
        $pages = ceil($total / $news_list->perPage());
        ?>
        <ul class="pagination">
            <?php
            $maxLinks = 5;
            $start = $news_list->currentPage() - floor($maxLinks / 2);
            $end = $news_list->currentPage() + floor($maxLinks / 2);
            if ($start < 1) {
                $end += abs($start) + 1;
                $start = 1;
            }
            if ($end > $pages) {
                $start -= $end - $pages;
                $end = $pages;
            }
            if ($start < 1) {
                $start = 1;
            }
            ?>
            @for($i = $start; $i <= $end; $i++) <li
                    class="@if($news_list->currentPage() == $i)current @endif page-item">
                <a class="page-link" href="{{$news_list->url($i)}}">
                    {{$i}}
                </a>
            </li>
            @endfor
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
        <table class="table table-bordered mb-0 news_table">
            <thead>
                <tr>
                    <th><span>ID</span></th>
                    <th><span>Tiêu đề</span></th>
                    <th><span>Người đăng</span></th>
                    <th><span>Danh mục</span></th>
                    <th><span>Ngày đăng</span></th>
                    {{-- <th><span>Tóm tắt</span></th>--}}
                    <th><span>Lượt xem</span></th>
                    <th><span>Xem chi tiết</span></th>
                    <th><span>Nổi bật</span></th>
                    <th><span>Ẩn / Hiện</span></th>
                    <th><span>Hành động</span></th>
                </tr>
            </thead>
            <tbody id="body-load-new">
                @foreach($news_list as $news)
                <tr>
                    <th class="text-muted">{{$news->id}}</th>
                    <td><a href="{{url('/single-news/'.$news->slug)}}" target="_blank">{{$news->title}}</a></td>
                    <td>
                        <span class="w_content">
                            @foreach($author as $aut)
                            @if($aut->id == $news->user_id)
                            {{$aut->name}}
                            @endif
                            @endforeach
                        </span>
                    </td>
                    <td>
                        @foreach($cat_list as $cat)
                        @if($cat->id == $news->category_id)
                        {{$cat->name}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <span class="w_content">
                            {{date('H:i:s d-m-Y', strtotime($news->created_at))}}
                        </span>
                    </td>
                    {{-- <td>{{$news->summary}}</td>--}}
                    <td>
                        {{-- <span class="label label-success">Paid</span>--}}
                        {{$news->view}}
                    </td>
                    <td>
                        <button class="w_content label-success text-white border-0">
                            <a class="text-white" href="{{url('/single-news/'.$news->slug)}}">
                                <i class="zmdi zmdi-eye"></i>
                            </a>
                        </button>
                    </td>
                    <td class="text-center">
                        <a href="/admin/news/hot/{{$news->id}}">
                            @if($news->hot == 0)
                            <i class="zmdi zmdi-star-outline" style="font-size: 20px"></i>
                            @else
                            <i class="zmdi zmdi-star" style="font-size: 20px"></i>
                            @endif
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#" onclick="changestusNew({{$news->id}})">
                            <input type="checkbox" class="js-switch-new" {{$news->appear == 1 ? "checked" : ""}} />
                        </a>
                        {{-- <a href="/admin/news/appear/{{$news->id}}">--}}
                            {{-- @if($news->appear == 0)--}}
                            {{-- <i class="zmdi zmdi-eye" style="font-size: 20px"></i>--}}
                            {{-- @else--}}
                            {{-- <i class="zmdi zmdi-eye-off" style="font-size: 20px"></i>--}}
                            {{-- @endif--}}
                            {{-- </a>--}}
                    </td>
                    <td class="text-center">
                        <a class="mr-3" href="{{url('admin/news/update/'.$news->id)}}">
                            <i class="zmdi zmdi-edit" style="font-size: 20px"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xoá?')"
                            href="{{url('admin/news/delete/'.$news->id)}}">
                            <i class="zmdi zmdi-delete" style="font-size: 20px"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- {{$news_list->links('admin.admin-paginate')}} -->


<!-- container -->
@endsection
@push('js')
<script src="{{url('assets')}}/cutstom-js/new.js"></script>

@endpush