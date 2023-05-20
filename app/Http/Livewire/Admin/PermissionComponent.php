<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionComponent extends Component
{
    public $editMode = false;
    public $name;
    public $permission;
    public $roless;
    public $permission_id;

    protected $rules = ['name' => 'required | min:3'];

    public function showFormAdd(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }
    public function storePermissionAdd(){
        $this->validate();
        $permission = Permission::create([
            'name' => $this->name
        ]);
        $superAdmin = Role::findByName('Super-Admin');
        $superAdmin->givePermissionTo($permission->name);
        session()->flash('message','Tạo quyền thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }
    public function showFormEdit(Permission $permission){
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->permission = $permission;
        $this->name = $permission->name;
        if(count($this->permission->roles) > 0){
            foreach($this->permission->roles as $key => $permission->role){
                $array[$key] =  $permission->role->name;
            }
            $this->roless = Role::whereNot(function ($query) use ($array)   {
                for ($i=0; $i < count($array) ; $i++) {
                    $query->orWhere('name', $array[$i]);
                }
            })
            ->get();
        }else $this->roless = Role::whereNotIn('name', ['Super-Admin'])->get();
    }
    public function removeRole(Permission $permission, Role $role){
        $permission->removeRole($role);
    }
    public function storePermissionEdit(){
        $this->validate();
        $this->permission->update([
            'name' => $this->name
        ]);
        if(!empty($this->permission_role)){
            $this->permission->assignRole($this->permission_role);
            session()->flash('message','Tạo vai trò thành công');
        }
        session()->flash('message','Sửa quyền thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }
    public function showDeletePermission($id){
        $this->permission_id = $id;
        $this->dispatchBrowserEvent('delete');
    }
    public function deletePermission(){
        $permission = Permission::findOrFail($this->permission_id);
        $permission->delete();
        session()->flash('message','Xóa quyền thành công');
        $this->dispatchBrowserEvent('hide-delete');
        $this->reset();
    }
    public function render()
    {
        $permissions = Permission::paginate(config('admin.paginate'));
        // $permissions = Permission::all();
        return view('livewire.admin.permission-component',compact('permissions'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Quyền truy cập',
            'title'=>'Quyền người dùng'
        ]);
    }
}
