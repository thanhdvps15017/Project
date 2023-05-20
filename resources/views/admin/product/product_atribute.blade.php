@extends('layouts.admin')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title" style="text-align: center">THUỘC TÍNH SẢN PHẨM</h4>
                <div class="alert alert-success" role="alert" style="width: 500px; text-align: center">
                    <h6 >{{isset($product->name) ? $product->name : ''}}</h6>
                </div>
                <hr>
                <div style="padding-bottom: 10px">
                    <a>
                        <button data-toggle="modal" data-target="#modal-add-attribute"
                                class="btn btn-success waves-effect waves-light btn-sm"><i
                                class="zmdi zmdi-plus-circle"></i> Thêm thuộc tính
                        </button>
                    </a>

                </div>

            </div>
            @if(count($data) > 0)
                <div style="text-align: right">
                    <span>Thuộc tính đã có: <?= count($data) ?></span>
                </div>
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>TÊN SẢN PHẨM</th>
                        <th style="text-align: center">MÀU SẮC</th>
                        <th style="text-align: center">SIZE</th>
                        <th style="text-align: center">SỐ LƯỢNG</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td><a href="">{{$item->name}}</a></td>
                            <td style="text-align: center ">{{$item->color}}</td>
                            <td style="text-align: center ">{{$item->size}}</td>
                            <td style="text-align: center ">{{$item->quantity}}</td>
                            <td style="text-align: right">
                                <a onclick="delete_product({{$item->id}})" data-toggle="modal"
                                   data-target="#modal-delete-product">
                                    <button title="xóa" data-original-title="xóa"
                                            class="btn waves-effect waves-light btn-danger disabled"><i
                                            class="zmdi zmdi-delete" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{url('admin/product/update', $item->id)}}" title="sửa"
                                   data-original-title="sửa" class="btn waves-effect waves-light btn-warning"> <i
                                        class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--                    <nav>--}}
                {{--                        <ul class="pagination pagination-split">--}}
                {{--                            <li class="page-item">--}}
                {{--                                {{ $data->links() }}--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </nav>--}}

            @else
                <div class="alert alert-warning" role="alert">
                   Sản phẩm hiện tại chưa có thuộc tính, bạn vui lòng thêm thuộc tính cho sản phẩm
                </div>
            @endif

        </div>
    </div>
    </div>
@endsection
@push('js')
    <script src="{{url('assets')}}/cutstom-js/product.js"></script>
    <script>
        $(document).ready(function () {
            const input = document.getElementById('myInput');
            input.addEventListener('input', function(event) {
                const value = event.target.value;
                event.target.value = value.toUpperCase();
            });


            @if (Session::has('msg'))
            toastr.success('{{ Session::get('msg') }}');
            @elseif(Session::has('success'))
            toastr.error('{{ Session::get('success') }}');
            @endif
        });
    </script>

@endpush
@push('modal')
    <div id="modal-add-attribute" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">TẠO THUỘC TÍNH SẢN PHẨM</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/product/attributes/save')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id"  value="{{$product->id}}">
                        <fieldset class="form-group">
                            <label for="exampleInputPassword1">Màu sắc</label>
                            <input type="text" name="color" id="myInput" class="form-control" autofocus required/>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="exampleInputPassword1">Size</label>
                            <input type="text" name="size" class="form-control" autofocus required/>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="exampleInputPassword1">Số lượng</label>
                            <input type="number" name="quantity" class="form-control" autofocus required/>
                        </fieldset>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush

