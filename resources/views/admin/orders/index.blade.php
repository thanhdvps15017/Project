@extends('layouts.admin')
@section('title')
Danh sách đơn hàng
@endsection
@section('admin_content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Danh sách đơn hàng</h4>

                <ol class="breadcrumb float-right">
                    <!-- <li class="breadcrumb-item">
                            <button class="btn-toggle">Toggle</button>
                        </li> -->
                    {{-- <li class="breadcrumb-item"><a href="#">Uplon</a></li> --}}
                    {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <!-- end row -->
    <div class="card mb-3">
        <div class="card-header">
            <strong>Tìm kiếm đơn hàng</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select id="status" name="status" class="form-control">
                            <option value="">Tất Cả Trạng Thái</option>
                            <option value="Chờ xác nhận">Chờ Xác Nhận</option>
                            <option value="Đang giao hàng">Đang Giao Hàng</option>
                            <option value="Giao thành công">Giao Thành Công</option>
                            <option value="Đã thanh toán">Đã thanh toán</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select id="arrange" name="arrange" class="form-control">
                            <option value="">Tất cả thời gian đăt hàng</option>
                            <option value="newest">Đơn Hàng Mới Nhất</option>
                            <option value="oldest">Đơn Hàng Cũ Nhất</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input style="text-align: center" type="text" id="code" class="form-control"
                            placeholder="Nhập mã đơn hàng">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
    <hr> --}}
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr style="text-align: center">
                        <th style="text-align: center"><span>ID</span></th>

                        <th style="text-align: center"><span>Tên</span></th>
                        <th style="text-align: center"><span>Số điện thoại</span></th>
                        <th style="text-align: center"><span>Địa chỉ</span></th>
                        <th style="text-align: center"><span>Thanh toán</span></th>
                        <th style="text-align: center"><span>Mã đơn hàng</span></th>
                        <th style="text-align: center"><span>Trạng thái</span></th>
                        <th style="text-align: center"><span>Tổng</span></th>
                        <th style="text-align: center"><span>Ngày tạo</span></th>
                        <th style="text-align: center"><span>Xem chi tiết</span></th>
                    </tr>
                </thead>
                <tbody id="body-load-order">
                    @foreach($list as $item)
                    <tr style="text-align: center">
                        <th class="text-muted">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->payment}}</td>
                        <td>{{$item->code}}</td>
                        <td>
                            @if($item->status == "Đã thanh toán")
                            <button class="btn btn-success">{{$item->status}}</button>
                            @else
                            <select data-id="{{$item->id}}" onchange="update_status({{$item->id}})" id="status_{{$item->id}}"
                                name="status" class="form-control status-change">
                                <option <?php if ($item->status == "Chờ xác nhận") {
                                    echo "selected";
                                } ?>value="Chờ xác nhận">Chờ xác nhận
                                </option>
                                <option <?php if ($item->status == "Đang giao hàng") {
                                    echo "selected";
                                } ?> value="Đang giao hàng">Đang Giao Hàng
                                </option>
                                <option <?php if ($item->status == "Giao thành công") {
                                    echo "selected";
                                } ?>
                                    value="Giao thành công">Giao Thành Công
                                </option>
                            </select>
                            @endif
                        </td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->note}}</td>
                        <td>{{$item->admin_note}}</td>
                        <td>{{$item->total}}</td>
                        <td>
                            <span class="w_content">
                                {{date('H:i:s d-m-Y', strtotime($item->created_at))}}
                            </span>
                        </td>
                        <td>
                            <button class="w_content label-success text-white border-0">
                                <a class="text-white" href="/admin/order/detail/{{$item->id}}">
                                    <i class="zmdi zmdi-eye"></i>
                                </a>
                            </button>
                        </td>
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
                    <div class="Page navigation m-auto ">
                        <?php
                        $total = $list->total();
                        $pages = ceil($total / $list->perPage());
                        ?>
                        <ul class="pagination justify-content-center">
                            <?php
                            $maxLinks = 5;
                            $start = $list->currentPage() - floor($maxLinks / 2);
                            $end = $list->currentPage() + floor($maxLinks / 2);
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
                                class="@if($list->currentPage() == $i)current @endif page-item">
                                <a class="page-link" href="{{$list->url($i)}}">
                                    {{$i}}
                                </a>
                                </li>
                                @endfor
                        </ul>
                    </div>
                </tbody>
            </table>

            {{-- <div class="row mt-3">
                <div class="Page navigation m-auto">
                    @php
                    $total = $list->total();
                    $pages = ceil($total / $list->perPage());
                    @endphp
                    <ul class="pagination">
                        <li class="prev page-item">
                            <a class="page-link" href="{{$list->previousPageUrl()}}">
                                <i class="zmdi zmdi-chevron-left"></i>
                            </a>
                        </li>
                        @for($i = 1; $i <= $pages; $i++) <li
                            class="@if($list->currentPage() == $i)current @endif page-item">
                            <a class="page-link" @if($list->currentPage() != $i)href="{{$list->url($i)}}" @endif>
                                {{$i}}
                            </a>
                            </li>

                            @endfor
                            <li class="next page-item">
                                <a class="page-link" href="{{$list->nextPageUrl()}}">
                                    <i class="zmdi zmdi-chevron-right"></i>

                                </a>
                            </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
    {{-- <div class="row mt-3">--}}
        {{-- <div class="Page navigation m-auto">--}}
            {{--
            @php
            {{-- $total = $news_list->total();--}}
            {{-- $pages = ceil($total / $news_list->perPage());--}}
            {{-- @endphp
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
@push('js')
{{-- <<<<<<< HEAD --}} <script src="{{url('assets')}}/cutstom-js/order.js">
    </script>

    @endpush
    {{--
    <script src="{{url('assets')}}/cutstom-js/order.js"></script>
    @endpush --}}
    {{-- >>>>>>> 700d813472e23e95495daf3ac90f75f4a3751d03 --}}