<div>
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title" style="text-align: center">QUYỀN</h4>
                <hr>
                <div style="padding-bottom: 10px">
                    <button class="btn btn-success waves-effect waves-light btn-sm" wire:click.prevent='showFormAdd'>
                        <i class="zmdi zmdi-plus-circle"></i>
                        Thêm quyền
                    </button>
                </div>
                @if(count($permissions) > 0)
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Vai trò</th>
                            <th width="10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $key => $permission)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$permission->name}}</td>
                            @if(count($permission->roles) > 0)
                            <td>
                                @foreach($permission->roles as $permission_role)
                                @if($permission_role->name != 'Super-Admin')
                                <a href="#" class="bg-danger p-2 rounded text-white"
                                    wire:click="removeRole({{$permission->id}},{{$permission_role->id}})">{{$permission_role->name}}</a>
                                @endif
                                @endforeach
                            </td>
                            @else
                            <td>Không có</td>
                            @endif
                            <td style="text-align: right">
                                <a href="#" wire:click.prevent='showFormEdit({{$permission->id}})'>
                                    <button class="btn waves-effect waves-light btn-primary disabled"><i
                                            class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="#" wire:click.prevent='showDeletePermission({{$permission->id}})'>
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
    <!-- Popup add, update permission -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <div class="modal-title">
                            @if($editMode)
                            <h4 class="modal-title" id="exampleModalLabel">Cập nhật quyền</h4>
                            @else
                            <h4 class="modal-title" id="exampleModalLabel">Thêm quyền</h4>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Name</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="name" id="name" placeholder="Name" type="text" class="form-control"
                                    value="" wire:model="name">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        @if($editMode)
                        <div class="row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Vai trò</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="permission_role" id="permission_role" class="form-control"
                                    wire:model="permission_role">
                                    <option value="0">Vai trò</option>
                                    @foreach($roless as $key => $role)
                                    <option value="{{$role->name}}">
                                        {{$role->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @if(session()->has('msgSpatie'))
                                <span class="text-success">{{session()->get('msgSpatie')}}</span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        @if($editMode)
                        <button type="button" class="btn btn-primary" wire:click.prevent="storePermissionEdit">
                            Cập nhật
                        </button>
                        @else
                        <button type="button" class="btn btn-primary" wire:click.prevent="storePermissionAdd">
                            Lưu
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- popup xóa comment --}}
    <div id="modal-delete-permission" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">XÁC NHẬN</h5>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='deletePermission'>
                        @csrf
                        <input type="hidden" name="permission_id" class="permission_id">
                        <P>Bạn có xác nhân muốn xóa quyền này không? </P>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        window.addEventListener('show-form',event =>{
            $('#form').modal('show');
        });
        window.addEventListener('hide-form',event =>{
            $('#form').modal('hide');
        });
        window.addEventListener('delete',event =>{
                $('#modal-delete-permission').modal('show');
            });
        window.addEventListener('hide-delete',event =>{
                $('#modal-delete-permission').modal('hide');
            });
    </script>

    @endpush
</div>