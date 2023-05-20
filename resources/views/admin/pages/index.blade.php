@extends('layouts.admin')
@section('title')
    Danh sách trang
@endsection
@section('admin_content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Trang</h4>
                    {{--                    <ol class="breadcrumb float-right">--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Uplon</a></li>--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>--}}
                    {{--                        <li class="breadcrumb-item active">Dashboard</li>--}}
                    {{--                    </ol>--}}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                <table class="table table-bordered mb-0 news_table">
                    <thead>
                    <tr>
                        <th><span>ID</span></th>
                        <th><span>Tên trang</span></th>
                        <th><span>Tiêu đề SEO</span></th>
                        <th><span>Mô tả</span></th>
                        <th><span>Từ khoá</span></th>
                        <th><span>Hành động</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <th class="text-muted">{{$page->id}}</th>
                            <td>{{$page->name}}</td>
                            <td>{{$page->title}}</td>
                            <td>{{$page->description}}</td>
                            <td>{{$page->keywords}}</td>
                            <td class="text-center">
                                <a href="{{url('admin/page/update/'.$page->id)}}">
                                    <button class="btn waves-effect waves-light btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- container -->
@endsection
