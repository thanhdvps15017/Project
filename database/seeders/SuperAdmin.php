<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_arr = [
            'news-list',
            'news-category',
            'news-comment',
            'product-list',
            'product-category',
            'product-brand',
            'product-comment',
            'order',
            'form-contact',
            'media',
        ];
        $role_arr = ['Super-Admin', 'Admin','Product-Full','News-Full'];
        foreach ($role_arr as $role_item) {
            Role::create(['name' => $role_item]);
        }
        foreach ($permission_arr as $permission_item) {
            $permission = Permission::create(['name' => $permission_item]);
            $newsFull = Role::findByName('News-Full');
            if( \Str::is('news*', $permission->name)){
                $newsFull->givePermissionTo($permission->name);
            }
            $productFull = Role::findByName('Product-Full');
            if( \Str::is('product*', $permission->name)){
                $productFull->givePermissionTo($permission->name);
            }
        }

        $permissions = Permission::pluck('id','id')->all();
        $role = Role::findByName('Super-Admin');
        //Thay đổi người mà muốn gán super-admin
        $user = \App\Models\User::where('email','beeswatch.online@gmail.com')->first();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
