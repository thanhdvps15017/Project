<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleComponent extends Component
{
    public $editMode = false;
    public $name;
    public $role_permission;
    public $role_id;
    public $role;
    public $permissions;


    protected $rules = [
        'name' => 'required | min:3'
    ];

    public function showFormAdd(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }

    public function storeRoleAdd(){
        // $this->validate();
        Role::create([
            'name' => $this->name
        ]);
        session()->flash('message','Tạo vai trò thành công');
        $this->dispatchBrowserEvent('message');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }

    public function showFormEdit($id){
        $this->reset();
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->role = Role::findOrFail($id);
        $this->name = $this->role->name;
        if(count($this->role->permissions) > 0){
            foreach($this->role->permissions as $key => $role_permissions){
                $array[$key] =  $role_permissions->name;
            }
            $this->permissions = Permission::whereNot(function ($query) use ($array)   {
                for ($i=0; $i < count($array) ; $i++) {
                    $query->orWhere('name', $array[$i]);
                }
            })
            ->get();
        }else $this->permissions = Permission::all();
    }
    public function revokePermission(Role $role, Permission $permission){
        $role->revokePermissionTo($permission);
        session()->flash('message','Đã thu hồi');
    }
    public function storeRoleEdit(){
        $this->role->update([
            'name' => $this->name
        ]);
        if(!empty($this->role_permission)){
            $this->role->givePermissionTo($this->role_permission);
            session()->flash('msgSpatie','Đã thêm');
        }
        // session()->flash('msg','Sửa vai trò thành công');
        // $this->dispatchBrowserEvent('message');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }

    public function showDeleteRole($id){
        $this->role_id = $id;
        $this->dispatchBrowserEvent('delete');
    }

    public function deleteRole(){
        $role_delete = Role::findOrFail($this->role_id);
        $role_delete->delete();
        session()->flash('message','Xóa vai trò thành công');
        $this->dispatchBrowserEvent('message');
        $this->dispatchBrowserEvent('hide-delete');
        $this->reset();
    }
    public function render()
    {
        $roles = Role::whereNotIn('name', ['super-admin'])->get();
        return view('livewire.admin.role-component',compact('roles'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Quyền truy cập',
            'title'=>'Vai trò người dùng'
        ]);
    }
}
