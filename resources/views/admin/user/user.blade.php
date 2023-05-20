@extends('layouts.admin')
@section('title') Quản trị người dùng @endsection
@section('admin_content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title" style="text-align: center">THÀNH VIÊN</h4>
      <hr>
      @if(count($users) > 0)
      <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Ảnh đại diện</th>
            <!-- <th>Vai trò</th> -->
            <th style="text-align: center">Name</th>
            <th>Email</th>
            <th style="text-align: center">Số điện thoại</th>
            <th style="text-align: center">Địa chỉ</th>
            <th style="text-align: center; width: 15%">THỜI GIAN TẠO</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>
              <div style=" width:50px; height:50px">
                <img src="{{asset($user->avatar)}}" alt="" style="width: 100%; border-radius: 50%; height: 100%; object-fit: cover">
              </div>
            </td>
            <!-- <td>
              {{$user->hasRole('Admin') ? "Admin" : "User"}}
            </td> -->
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->address}}</td>
            <td style="text-align: center">
              <?= date("H:i d-m-Y", strtotime($user->created_at)) ?>
            </td>
            <td style="text-align: right">
              @if($user->hasRole('Admin'))
              <a href="{{route('impersonate', [$user->id])}}">
                <button class="btn waves-effect waves-light btn-warning disabled impersonate">
                  <i class="ion-person-stalker"></i>
                </button>
              </a>
              @endif
              <a href="{{route('user.permission', [$user->id])}}">
                <button class="btn waves-effect waves-light btn-primary disabled">
                  <i class="ion-key"></i>
                </button>
              </a>
              <a onclick="delete_user({{$user->id}})" data-toggle="modal" data-target="#modal-delete-user">
                <button class="btn waves-effect waves-light btn-danger disabled"><i class="fa fa-trash"
                    aria-hidden="true"></i>
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
<div id="modal-delete-user" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mySmallModalLabel">XÁC NHẬN</h5>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.user.destroy')}}" method="post">
          @csrf
          <input type="hidden" name="user_id" class="user_id">
          <P>Bạn có xác nhân muốn xóa thành viên này không? </P>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- popup add category --}}
<div id="modal-revoke-permission" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mySmallModalLabel">Quyền và vai trò</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            {{-- @foreach($user) --}}
            <div class="checkbox checkbox-success checkbox-circle">
              <input id="checkbox-10" type="checkbox" checked="" name="role[]">
              <label for="checkbox-10">
                Success
              </label>
            </div>
            {{-- @endforeach --}}
          </div>
          <div class="col-sm-6">
            <div class="checkbox checkbox-success checkbox-circle">
              <input id="checkbox-10" type="checkbox" checked="">
              <label for="checkbox-10">
                Success
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endpush
@push('js')
<script src="{{url('assets')}}/cutstom-js/user.js"></script>
<script>
  $(document).ready(function () {
            @if (Session::has('msg'))
            toastr.success('{{ Session::get('msg') }}');
            @elseif(Session::has('success'))
            toastr.error('{{ Session::get('success') }}');
            @endif
        });


</script>

@endpush
