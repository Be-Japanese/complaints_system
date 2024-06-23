<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $permission_var = [

       "create-users",
        "edit-users",
        "delete-users",
        "show-users",

        "create-roles",
        "edit-roles",
        "delete-roles",
        "show-roles",

        "create-cities",
        "edit-cities",
        "delete-cities",
        "show-cities",

        "create-categories",
        "edit-categories",
        "delete-categories",
        "show-categories",

        "create-complaints",
        "edit-complaints",
        "delete-complaints",
        "show-complaints",


      ];

      $permissions = collect($permission_var)->map(function ($permission) {
        return ['name' => $permission, 'guard_name' => 'web'];
      });

      Permission::insert($permissions->toArray());

      $adminRole = Role::create(['name' => 'Super Admin']);

      $adminRole->givePermissionTo($permission_var);
    }
}
