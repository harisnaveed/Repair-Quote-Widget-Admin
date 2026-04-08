<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 🔹 Create Permissions
        $permissions = [
            'view locations',
            'create locations',
            'edit locations',
            'delete locations',

            'view staff',
            'create staff',
            'edit staff',
            'delete staff',

            'view devices',
            'create devices',
            'edit devices',
            'delete devices',

            'view brands',
            'create brands',
            'edit brands',
            'delete brands',

            'view leads',
            'create leads',
            'edit leads',
            'delete leads',

            'view repairs issues',
            'create repairs issues',
            'edit repairs issues',
            'delete repairs issues',

            'view products',
            'create products',
            'edit products',
            'delete products',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // 🔹 Create Roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $technician = Role::firstOrCreate(['name' => 'technician']);

        // 🔹 Admin → ALL permissions
        $admin->givePermissionTo(Permission::all());

        // 🔹 Technician → LIMITED permissions
        $technician->givePermissionTo([
            'view devices',
            'view brands',
            'view leads',
            'view repairs issues',
            'view products',
        ]);
    }
}
