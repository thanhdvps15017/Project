@extends('layouts.admin')
@section('title') Quản trị email @endsection
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h1 class="m-t-0 header-title" style="text-align: center">DANH SÁCH MAIL ĐƯỢC GỬI</h1>
                <hr>
                @if(count($email_list) > 0)
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style="text-align: center; width: 15%;">Tên người gửi</th>
                            <th style="text-align: center; width: 10%;">Số điện thoại</th>
                            <th style="text-align: center; width: 20%;">Email</th>
                            <th style="text-align: center; width: 35%;">Lời nhắn</th>
                            <th style="text-align: center; width: 12%;">Ngày gửi</th>
                            <th style="text-align: center; width: 10%;">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($email_list as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->message}}</td>
                                <td style="text-align: center">{{ date("H:i d-m-Y", strtotime($item->created_at)) }}</td>
                                <td style="text-align: center">
                                    <a onclick="return confirm('Bạn có chắc muốn xoá?')" href="/admin/contact/delete/{{$item->id}}">
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

