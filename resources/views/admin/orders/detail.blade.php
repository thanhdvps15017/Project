@extends('layouts.admin')
@section('title')
Đơn hàng chi tiết
@endsection
@section('admin_content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Đơn hàng</h4>

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


    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-bordered mb-0 news_table">
                <thead>
                    <tr>
                        <th><span>ID</span></th>
                        <th><span>ID đơn hàng</span></th>
                        <th><span>Sản phẩm</span></th>
                        <th><span>Số lượng</span></th>
                        <th><span>Đơn giá</span></th>
                        <th><span>Tổng phụ</span></th>
                        <th><span>Ngày tạo</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                    <tr>
                        <th class="text-muted">{{$item->id}}</th>
                        <td>{{$item->order_id }}</td>
                        <td>
                            @foreach($pd_list as $pd)
                            @if($pd->id == $item->product_id)
                            {{$pd->name}}
                            @endif
                            @endforeach
                        </td>
                        <td>{{$item->quantity}}</td>
                        <td>
                            <?=number_format($item->price, 0, ",", ".")?>
                        </td>
                        <td>
                            <?=number_format($item->price * $item->quantity, 0, ",", ".")?>
                        </td>
                        <td>
                            <span class="w_content">
                                {{date('H:i:s d-m-Y', strtotime($item->created_at))}}
                            </span>
                        </td>
                        {{-- <td>--}}
                            {{-- <button class="w_content label-success text-white border-0">--}}
                                {{-- <a href="/admin/order/detail/{{$item->id}}">Xem chi tiết</a>--}}
                                {{-- </button>--}}
                            {{-- </td>--}}
                        {{-- <td class="text-center">--}}
                            {{-- <a class="mr-3" href="{{url('admin/news/update/'.$news->id)}}">--}}
                                {{-- <i class="zmdi zmdi-edit" style="font-size: 20px"></i>--}}
                                {{-- </a>--}}
                            {{-- <a onclick="return confirm('Bạn có chắc chắn muốn xoá?')"
                                href="{{url('admin/news/delete/'.$news->id)}}">--}}
                                {{-- <i class="zmdi zmdi-delete" style="font-size: 20px"></i>--}}
                                {{-- </a>--}}
                            {{-- </td>--}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="row mt-3">--}}
        {{-- <div class="Page navigation m-auto">--}}
            {{--
            <?php--}}
        {{--                $total = $news_list->total();--}}
        {{--                $pages = ceil($total / $news_list->perPage());--}}
        {{--                ?>--}}
            {{-- <ul class="pagination">--}}
                {{-- <li class="prev page-item">--}}
                    {{-- <a class="page-link" href="{{$news_list->previousPageUrl()}}">--}}
                        {{-- <i class="zmdi zmdi-chevron-left"></i>--}}
                        {{-- </a>--}}
                    {{-- </li>--}}
                {{-- @for($i = 1; $i <= $pages; $i++)--}} {{-- <li
                    class="@if($news_list->currentPage() == $i)current @endif page-item">--}}
                    {{-- <a class="page-link" @if($news_list->currentPage() != $i)href="{{$news_list->url($i)}}"
                        @endif>--}}
                        {{-- {{$i}}--}}
                        {{-- </a>--}}
                    {{-- </li>--}}

                    {{-- @endfor--}}
                    {{-- <li class="next page-item">--}}
                        {{-- <a class="page-link" href="{{$news_list->nextPageUrl()}}">--}}
                            {{-- <i class="zmdi zmdi-chevron-right"></i>--}}

                            {{-- </a>--}}
                        {{-- </li>--}}
                    {{-- </ul>--}}
            {{--
        </div>--}}
        {{-- </div>--}}

</div> <!-- container -->
@endsection