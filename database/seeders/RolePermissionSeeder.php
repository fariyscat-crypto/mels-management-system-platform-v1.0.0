<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin',
            'manager',
            'editor',
            'viewer',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        $permissions = [
            'manage users',
            'view reports',
            'manage settings',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }

        Role::findByName('admin')->givePermissionTo($permissions);
        Role::findByName('manager')->givePermissionTo(['view reports']);
    }
}
