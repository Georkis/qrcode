<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create([
            'name' => 'Admin'
        ]);
        $roleStaff = Role::create([
            'name' => 'Staff'
        ]);

        //Access Role
        $rolePermissionCreate = Permission::create(attributes: ['name' => 'Created Role']);
        $rolePermissionRead = Permission::create(attributes: ['name' => 'Read Role']);
        $rolePermissionUpdate = Permission::create(attributes: ['name' => 'Update Role']);
        $rolePermissionDelete = Permission::create(attributes: ['name' => 'Delete Role']);
        //End

        //Access User
        $userPermissionCreate = Permission::create(attributes: ['name' => 'Created User']);
        $userPermissionRead = Permission::create(attributes: ['name' => 'Read User']);
        $userPermissionUpdate = Permission::create(attributes: ['name' => 'Update User']);
        $userPermissionDelete = Permission::create(attributes: ['name' => 'Delete User']);
        $userPermissionActive = Permission::create(attributes: ['name' => 'Active User']);

        $permissionsAdmin = [
            $rolePermissionCreate, $rolePermissionRead, $rolePermissionUpdate, $rolePermissionDelete,
            $userPermissionCreate, $userPermissionRead, $userPermissionUpdate, $userPermissionDelete, $userPermissionActive
        ];

        $roleAdmin->syncPermissions($permissionsAdmin);

    }
}
