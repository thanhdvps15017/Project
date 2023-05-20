@extends('layouts.admin')
@section('title')Bình luận sản phẩm@endsection
@section('admin_content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title" style="text-align: center">BÌNH LUẬN SẢN PHẨM</h4>
      <hr>
      @if(count($productComments) > 0)
      <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th style="text-align: center">NỘI DUNG</th>
            <th>TÁC GIẢ</th>
            <th>SẢN PHẨM</th>
            <th style="text-align: center">TRẠNG THÁI</th>
            <th style="text-align: center; width: 15%">THỜI GIAN TẠO</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($productComments as $productComment)
          <tr>
            <td>{{$productComment->message}}</td>
            <td>{{$productComment->user->name ?? 'author'}}</td>
            <td>{{$productComment->product->name}}</td>
            <td class="text-center">
              <a href="#" data-id="{{$productComment->id}}" data-appear="{{$productComment->appear}}"
                class="btn-appear">
                  <input type="checkbox" id="js-switch-status-product-comment" class="js-switch-status-product-comment" {{$productComment->appear ? "checked" : ""}} />
              </a>
            </td>
            <td style="text-align: center">
              {{ date("H:i d-m-Y", strtotime($productComment->created_at)) }}
            </td>
            <td style="text-align: right">
              <a href="#" data-toggle="modal" data-target="#modal-delete-product-comment">
                <button class="btn waves-effect waves-light btn-danger disabled btn-delete_comment"
                  data-id="{{$productComment->id}}">
                  <i class="fa fa-trash" aria-hidden="true"></i>
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
@push('modal')
{{-- popup xóa comment --}}
<div id="modal-delete-product-comment" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
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
          <button type="submit" class="btn btn-primary btn-submit" data-dismiss="modal">Xác nhận</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- popup add category --}}
@endpush
@push('js')
<script src="{{url('assets')}}/cutstom-js/product_comment.js"></script>
<script>
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch-status-product-comment'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html, { color: '#1AB394' });
    });
  $(document).ready(function () {
            @if (Session::has('msg'))
            toastr.success('{{ Session::get('msg') }}');
            @elseif(Session::has('success'))
            toastr.error('{{ Session::get('success') }}');
            @endif
        });
</script>
<script>
  $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });
  $('.btn-appear').on('click',function(){
      const id = $(this).data('id');
      const appear = 1 - $(this).data('appear');
      $.ajax({
          url: '{{ route("product.comment.changeAppear") }}',
          method: 'POST',
          data: {
              id: id,
              appear: appear,
              _token: $('meta[name="csrf-token"]').attr('content')
          },
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
              url: '{{ route("product.comment.destroy") }}',
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
