@extends('layouts.admin')
@section('title') Sản phẩm @endsection
@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title" style="text-align: center">DANH SÁCH SẢN PHẨM</h4>
            <hr>
            <div style="padding-bottom: 10px">
                <a href="{{url('admin/product/add')}}">
                    <button data-toggle="modal" data-target="#modal-add-category"
                        class="btn btn-success waves-effect waves-light btn-sm"><i class="zmdi zmdi-plus-circle"></i>
                        Thêm sản phẩm
                    </button>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <strong>Tìm Kiếm Sản Phẩm</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="search" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="appear" name="appear" class="form-control">
                                <option value="">Tất Cả Trạng Thái</option>
                                <option value="1">Đang Bán</option>
                                <option value="0">Tạm Dừng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="brand" name="brand_id" class="form-control">
                                <option value="">Tất Cả Thương Hiệu</option>
                                @foreach($brand as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="category" name="category_id" class="form-control">
                                <option value="">Tất Cả Danh Mục</option>
                                @foreach($Cate as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <fieldset class="form-group">
                            <label>Lọc Theo Giá</label>
                            <input type="text" name="price_range" id="price_range">
                        </fieldset>
                    </div>
                </div>
            </div>
            <!-- Paginate o duoi -->
            <div class="Page navigation m-auto">
                <?php
                $total = $data->total();
                $pages = ceil($total / $data->perPage());
                ?>
                <ul class="pagination">
                    <?php
                    $maxLinks = 5;
                    $start = $data->currentPage() - floor($maxLinks / 2);
                    $end = $data->currentPage() + floor($maxLinks / 2);
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
                        class="@if($data->currentPage() == $i)current @endif page-item">
                        <a class="page-link" href="{{$data->url($i)}}">
                            {{$i}}
                        </a>
                        </li>
                        @endfor
                </ul>
            </div>
        </div>
        @if(count($data) > 0)
        <div style="text-align: right">
            <span>Tổng sản phẩm:
                <?= count($data) ?>
            </span>
        </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>TÊN SẢN PHẨM</th>
                    <th style="text-align: center">ẢNH ĐẠI DIỆN</th>
                    <th style="text-align: center">THƯƠNG HIỆU</th>
                    <th style="text-align: center">DANH MỤC</th>
                    <th style="text-align: center">GIÁ BÁN</th>
                    <th style="text-align: center">SỐ LƯỢNG</th>
                    <th style="text-align: center">ĐÃ BÁN</th>
                    <th style="text-align: center">TRẠNG THÁI</th>
                    <th style="text-align: center">THAO TÁC</th>
                </tr>
            </thead>
            <tbody id="body-load-product">
                @foreach($data as $item)
                @php $img = json_decode($item->images) @endphp
                <tr>
                    <td><a href="">{{$item->name}}</a></td>
                    <td style="text-align: center "><img
                            src="{!! asset(App\Http\Controllers\Controller::get_img_url($img[0]))!!}" alt=""
                            width="50px">
                    </td>
                    <td style="text-align: center ">{{$item->brand_name}}</td>
                    <td style="text-align: center ">{{$item->cate_name}}</td>
                    <td style="text-align: center ">
                        <div class="row">
                            <span style=" text-decoration: line-through;" class="col">
                                <?= number_format($item->price, 0, ',', '.') . "đ"; ?>
                            </span>
                        </div>
                        <div class="row">
                            <span class="col">
                                <?= number_format($item->price_pay, 0, ',', '.') . "đ"; ?>
                            </span>
                        </div>
                    </td>
                    <td style="text-align: center ">{{$item->quantity}}</td>
                    <td style="text-align: center ">{{$item->bought}}</td>
                    <td style="text-align: center">
                        <a href="#" onclick="changestus({{$item->id}})">
                            <input type="checkbox" class="js-switch" {{$item->appear === 1 ? "checked" : ""}} />
                        </a>
                    </td>



                    <td style="text-align: right">
                        {{-- <a title="thêm thuộc tính" data-original-title="thêm thuộc tính" --}} {{--
                            class="btn waves-effect btn-secondary" --}} {{--
                            href="{{url('admin/product/attributes', $item->id)}}">--}}
                            {{-- <i class="zmdi zmdi-plus-circle"></i>--}}
                            {{-- </a>--}}
                        <a onclick="delete_product({{$item->id}})" data-toggle="modal"
                            data-target="#modal-delete-product">
                            <button title="xóa" data-original-title="xóa"
                                class="btn waves-effect waves-light btn-danger disabled"><i class="zmdi zmdi-delete"
                                    aria-hidden="true"></i>
                            </button>
                        </a>
                        <a href="{{ url('admin/product/update', $item->id) }}" target="" title="sửa"
                            class="btn waves-effect waves-light btn-warning">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- {{$data->links('admin.admin-paginate')}} -->

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
<script src="{{url('assets')}}/cutstom-js/product.js"></script>
<script>
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    // elems.forEach(function(html) {
    //     var switchery = new Switchery(html, { color: '#1AB394' });
    // });

    const dragItems = document.querySelectorAll('.drag-item');

    let dragItem = null;

    function handleDragStart(event) {
        dragItem = this;
        event.dataTransfer.setData('text/plain', this.dataset.value);
    }

    function handleDragOver(event) {
        event.preventDefault();
    }

    function handleDrop(event) {
        const data = event.dataTransfer.getData('text/plain');
        const dropItem = this;

        if (dragItem !== dropItem) {
            const tempValue = dropItem.dataset.value;
            dropItem.dataset.value = dragItem.dataset.value;
            dragItem.dataset.value = tempValue;

            dropItem.textContent = dragItem.dataset.value;
            dragItem.textContent = tempValue;
        }

        dragItem = null;
    }

    dragItems.forEach(item => {
        item.addEventListener('dragstart', handleDragStart);
        item.addEventListener('dragover', handleDragOver);
        item.addEventListener('drop', handleDrop);
    });

    $(document).ready(function () {
        @if (Session:: has('msg'))
    toastr.success('{{ Session::get('msg') }}');
    @elseif(Session:: has('success'))
    toastr.error('{{ Session::get('success') }}');
    @endif
        });
</script>

@endpush
@push('modal')
<div id="modal-delete-product" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">XÁC NHẬN</h5>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/product/delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="item_id" class="item_id">
                    <P>Bạn có xác nhân muốn xóa sản phẩm này không? </P>
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