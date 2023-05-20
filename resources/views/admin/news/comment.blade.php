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


    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><span>ID</span></th>
                        <th><span>Nội dung</span></th>
                        <th><span>Người đăng</span></th>
                        <th><span>Bài viết</span></th>
                        <th><span>Ngày đăng</span></th>
                        <th><span>Ẩn / Hiện</span></th>
                        <th><span>Hành động</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newsComments as $newsComment)
                    <tr>
                        <th class="text-muted">{{$newsComment->id}}</th>
                        <td>{{$newsComment->message}}</td>
                        <td>{{$newsComment->user->name ?? 'author'}}</td>
                        <td>{{$newsComment->news->title}}</td>
                        <td>
                            <span class="w_content">
                                {{date('H:i:s d-m-Y', strtotime($newsComment->created_at))}}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="#" data-id="{{$newsComment->id}}" data-appear="{{$newsComment->appear}}"
                                class="btn-appear">
                                <input type="checkbox" id="js-switch-status-new-comment" class="js-switch-status-new-comment" {{$newsComment->appear ? "checked" : ""}} />
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="#" data-id="{{$newsComment->id}}" class="btn-delete_comment" data-toggle="modal"
                                data-target="#form-delete">
                                <i class="zmdi zmdi-delete" style="font-size: 20px"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="Page navigation m-auto">
            <?php
                $total = $newsComments->total();
                $pages = ceil($total / $newsComments->perPage());
                ?>
            <ul class="pagination">
                <li class="prev page-item">
                    <a class="page-link" href="{{$newsComments->previousPageUrl()}}">
                        <i class="zmdi zmdi-chevron-left"></i>
                    </a>
                </li>
                @for($i = 1; $i <= $pages; $i++) <li
                    class="@if($newsComments->currentPage() == $i)current @endif page-item">
                    <a class="page-link" @if($newsComments->currentPage() != $i)href="{{$newsComments->url($i)}}"
                        @endif>
                        {{$i}}
                    </a>
                    </li>

                    @endfor
                    <li class="next page-item">
                        <a class="page-link" href="{{$newsComments->nextPageUrl()}}">
                            <i class="zmdi zmdi-chevron-right"></i>

                        </a>
                    </li>
            </ul>
        </div>
    </div>
</div> <!-- container -->
@endsection
@push('modal')
{{-- popup xóa comment --}}
<div id="form-delete" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">XÁC NHẬN</h5>
            </div>
            <div class="modal-body">
                <P>Bạn có xác nhân muốn xóa danh mục này không? </P>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                    <button type="button" class="btn btn-primary btn-submit" data-dismiss="modal">Xác nhận</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- popup add category --}}
@endpush
@push('js')
<script>

    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch-status-new-comment'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html, { color: '#1AB394' });
    });

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('.btn-appear').on('click',function(){
        const id = $(this).data('id');
        const appear = 1 - $(this).data('appear');
        $.ajax({
            url: '{{ route("admin.newsComment.changeAppear") }}',
            method: 'POST',
            data: {
                id: id,
                appear: appear,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            // headers: {
            //         'X-CSRF-Token': '{{csrf_token()}}'
            //    },
            success: function (response) {
                if (response.success) {
                    $('.btn-appear[data-id="' + id + '"]').data('appear', appear);
                    $('.btn-appear[data-id="' + id + '"]').find('i').toggleClass('zmdi-eye zmdi-eye-off')
                    toastr.success('Thay đổi trạng thái thành công');
                }
            },
            error: function (response) {
                console.log(response);
            },
        })
    });
    $('.btn-delete_comment').on('click',function(){
        const id = $(this).data('id');
        const _this = $(this);
        $('.btn-submit').on('click',function(){
            $.ajax({
                url: '{{ route("admin.newsComment.destroy") }}',
                method: 'POST',
                data: {
                    id: id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        _this.closest("tr").remove();
                    }
                },
                error: function (response) {
                    console.log(response);
                },
            })
        })
    })
</script>
@endpush
