@extends('layouts.admin')
@section('title')Mã giảm giá@endsection
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title" style="text-align: center">DANH SÁCH MÃ GIẢM GIÁ</h4>
                <hr>
                @if(count($coupon_list) > 0)
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style="text-align: center;">Mã giảm giá</th>
                            <th style="text-align: center;">Loại mã</th>
                            <th style="text-align: center;">Số tiền giảm</th>
                            <th style="text-align: center;">Đơn hàng tối thiểu</th>
                            <th style="text-align: center;">Số tiền tối đa</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th style="text-align: center;">Còn lại</th>
                            <th style="text-align: center;">Ngày tạo</th>
                            <th style="text-align: center;">Ngày bắt đầu</th>
                            <th style="text-align: center;">Ngày kết thúc</th>
                            <th style="text-align: center;">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupon_list as $item)
                            <tr>
                                <td style="text-align: center">{{$item->coupon_code}}</td>
                                <td style="text-align: center">
                                    @if($item->coupon_type == 0)
                                        Giảm theo %
                                    @else
                                        Giảm trực tiếp
                                    @endif
                                </td>
                                <td style="text-align: center">{{$item->discount}}</td>
                                <td style="text-align: center">{{number_format($item->min_total, 0,',','.')}}</td>
                                <td style="text-align: center">{{number_format($item->max_discount, 0,',','.')}}</td>
                                <td style="text-align: center">{{$item->quantity}}</td>
                                <td style="text-align: center">{{$item->remaining}}</td>
                                <td style="text-align: center">{{date("d-m-Y", strtotime($item->created_at))}}</td>
                                <td style="text-align: center">{{date("d-m-Y", strtotime($item->date_start))}}</td>
                                <td style="text-align: center">{{date("d-m-Y", strtotime($item->date_expire))}}</td>
                                <td style="text-align: center">
                                    <a href="/admin/coupon/update/{{$item->id}}">
                                        <button class="btn waves-effect waves-light btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xoá?')"   href="/admin/coupon/delete/{{$item->id}}">
                                        <button class="btn waves-effect waves-light btn-danger disabled"><i
                                                class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning" role="alert">
                        Chưa có dữ liệu phù hợp
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{url('assets')}}/cutstom-js/category.js"></script>
    <script>
        $(document).ready(function() {
            @if (Session::has('msg'))
            toastr.success('{{ Session::get('msg') }}');
            @elseif(Session::has('success'))
            toastr.error('{{ Session::get('success') }}');
            @endif
        });
    </script>

@endpush
@push('modal')
    <div id="modal-add-category" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">THÊM DANH MỤC SẢN PHẨM</h5>
                </div>
                <form action="{{url('admin/product_category/save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <fieldset class="form-group">
                            <label for="exampleInputPassword1">Tiêu đề</label>
                            <input type="text" name="name" class="form-control" autofocus required/>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- popup add category   --}}
    <div id="modal-delete-category" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">XÁC NHẬN</h5>
                </div>
                <div class="modal-body">
                    <form  action="{{url('admin/product_category/delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="item_id" class="item_id">
                        <P>Bạn có xác nhân muốn xóa danh mục này không? </P>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- popup add category   --}}

    <div id="modal-update-category" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">CẬP NHẬT DANH MỤC</h5>
                </div>
                <form action="{{url('admin/product_category/update')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <fieldset class="form-group">
                            <input type="hidden" name="item_id" class="item_id">
                            <label for="exampleInputPassword1">Tiêu đề</label>
                            <input type="text" name="name" class="form-control" autofocus required/>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- popup add category   --}}
@endpush

