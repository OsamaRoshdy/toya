<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $models = ['admins', 'roles'];
        $actions = ['read', 'update', 'delete', 'create'];

        $permissions = [];
        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permission['guard_name'] = 'admin';
                $permission['name'] = $action . '_' . $model;
                array_push($permissions, $permission);
            }
        }
        Permission::insert($permissions);

        $role = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $role->givePermissionTo(Permission::all());


    }
}
