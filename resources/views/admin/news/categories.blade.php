@extends('layouts.admin')
@section('title')
    Danh mục tin tức
@endsection
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title" style="text-align: center">DANH MỤC TIN TỨC </h4>
                <hr>
                <div style="padding-bottom: 10px">

                    <button data-toggle="modal" data-target="#modal-add-news-category"
                            class="btn btn-success waves-effect waves-light btn-sm"><i
                                class="zmdi zmdi-plus-circle"></i> Thêm danh mục
                    </button>
                </div>
                @if(count($cat_list) > 0)
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>TÊN DANH MỤC</th>
                            <th style="text-align: center">TRẠNG THÁI</th>
                            <th style="text-align: center">THỜI GIAN TẠO</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cat_list as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td style="text-align: center">
                                    <a href="#" onclick="changeStatusCate({{$item->id}})">
                                        <input type="checkbox" id="js-switch-categori" class="js-switch-categori" {{$item->appear == 1 ? "checked" : ""}} />
                                    </a>
                                </td>
                                <td style="text-align: center"><?= date("H:i:s d-m-Y", strtotime($item->created_at))  ?></td>
                                <td style="text-align: right">
                                    <a onclick="delete_category({{$item->id}})" data-toggle="modal" data-target="#modal-delete-news-category">
                                        <button class="btn waves-effect waves-light btn-danger disabled"><i
                                                    class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <a onclick="update_category({{$item->id}}, this.dataset.title)" data-title="{{$item->name}}" id="update_cate" data-toggle="modal" data-target="#modal-update-news-category">
                                        <button class="btn waves-effect waves-light btn-warning">
                                            <i class="fa fa-pencil"></i>
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
    <script src="{{url('assets')}}/cutstom-js/news_category.js"></script>
    <script>

        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch-categori'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html, { color: '#1AB394' });
        });
        // ---------------switchery------------------------

        function changeStatusCate(id){
            event.preventDefault()
            $.ajax({
                url: '/admin/category/changeStatus/' + id,
                method: 'get',
                success: function(response) {
                    toastr.success('Cập nhật trạng thái thành công');
                }
            });
        }
        //------------------changeStattus----------------------------

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
    <div id="modal-add-news-category" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">THÊM DANH MỤC TIN TỨC</h5>
                </div>
                <form action="{{url('admin/category/add')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tiêu đề</label>
                            <input type="text" name="name" class="form-control title_input" autofocus required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên kết</label>
                            <input type="text" name="slug" class="form-control slug_output" autofocus />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa SEO</label>
                            <input type="text" name="keywords" class="form-control" autofocus />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả ngắn</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Chọn ảnh</label>
                            <a href="/admin/media/popup" class="btn btn-primary text-white choose_img_btn" data-key="image">Chọn hình ảnh</a>
                            <img src="" class="image img_result">
                            <input type="hidden" name="image" class="image">
                        </div>
                        <div class="form_group">
                            <label for="appear">Hiện</label>
                            <input type="radio" name="appear" id="hide" value="1" checked>
                            <label for="appear">Ẩn</label>
                            <input type="radio" name="appear" id="appear" value="0">
                        </div>
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
    <div id="modal-delete-news-category" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">XÁC NHẬN</h5>
                </div>
                <div class="modal-body">
                    <form  action="{{url('admin/category/delete')}}" method="post">
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

    <div id="modal-update-news-category" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">CẬP NHẬT DANH MỤC</h5>
                </div>
                <form action="{{url('admin/category/update')}}" method="post">
                    @csrf
                    <div class="modal-body" id="body-category">

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

