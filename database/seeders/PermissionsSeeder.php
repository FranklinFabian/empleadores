<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\Administracion\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_array = [];
        array_push($permissions_array, Permission::create(['name' => 'administrador_create']));
        array_push($permissions_array, Permission::create(['name' => 'administrador_edit']));
        array_push($permissions_array, Permission::create(['name' => 'administrador_delete']));

        $viewPermission = Permission::create(['name' => 'administrador_view']);
        array_push($permissions_array, $viewPermission);

        $superAdminRole = Role::create(['name' => 'administrador']);
        $superAdminRole->syncPermissions($permissions_array);
    }
}
