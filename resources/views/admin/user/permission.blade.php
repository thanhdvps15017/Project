@extends('layouts.admin')
@section('title') Quản trị người dùng @endsection
@section('admin_content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title" style="text-align: center">{{$user->name}}</h4>
      <hr>
      <form action="{{route('user.permission.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Vai trò</th>
                </tr>
              </thead>
              <tbody>
                @foreach($roles as $role)
                <tr>
                  <td>
                    <div class="checkbox checkbox-success checkbox-circle">
                      <input id="{{$role->name}}" type="checkbox" @if($user->hasRole($role->name)) checked="" @endif
                      name="role[]" value="{{$role->name}}">
                      <label for="{{$role->name}}">
                        {{$role->name}}
                      </label>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-sm-6">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Quyền</th>
                </tr>
              </thead>
              <tbody>
                @foreach($permissions as $permission)
                <tr>
                  <td>
                    <div class="checkbox checkbox-success checkbox-circle">
                      <input id="{{$permission->name}}" type="checkbox" {{$user->hasDirectPermission($permission->name)
                      ?
                      "checked=''" : ""}}
                      name="permission[]" value="{{$permission->name}}">
                      <label for="{{$permission->name}}">
                        {{$permission->name}}
                      </label>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="form-footer d-flex justify-content-center align-items-center">
          <button type="submit" class="btn btn-primary text-center">Thay đổi</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection