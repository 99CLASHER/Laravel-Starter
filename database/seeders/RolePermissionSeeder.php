<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $adminPermissions = [ 'view-dashboard',
        'create-user', 'edit-user', 'delete-user', 'view-user',
        'create-role', 'edit-role', 'delete-role', 'view-role',
        'create-permission', 'edit-permission', 'delete-permission', 'view-permission'];

        foreach ($adminPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $role = Role::firstOrCreate(['name' => 'superadmin']);
        $role->givePermissionTo($adminPermissions);
    }
}
