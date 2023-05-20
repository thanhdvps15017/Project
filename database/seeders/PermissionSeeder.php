<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role = Role::create(['name' => 'writer']);
        // $role = Role::create(['name' => 'editor']);
        // $role = Role::create(['name' => 'user']);
        // $permission = Permission::create(['name' => 'edit articles']);
        // $permission = Permission::create(['name' => 'edit product']);
        // $permission = Permission::create(['name' => 'edit news']);
        // $role = Role::create(['name' => 'super-admin']);
        // $permission = Permission::create(['name' => 'edit all']);
        $role = Role::findByName('writer');
        $role->givePermissionTo('edit product');
        $user = \App\Models\User::findOrFail(4)->assignRole($role);
    }
}
