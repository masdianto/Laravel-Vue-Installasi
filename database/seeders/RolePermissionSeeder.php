<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assign all permissions to Super Admin
        $superAdminRole = Role::where('name', 'Super Admin')->first();
        $allPermissions = Permission::all();
        $superAdminRole->permissions()->attach($allPermissions);

        // Assign permissions to HRD
        $hrdRole = Role::where('name', 'HRD')->first();
        $hrdPermissions = Permission::whereIn('name', [
            'create_user',
            'edit_user',
            'delete_user',
            'view_payroll',
            'edit_payroll',
        ])->get();
        $hrdRole->permissions()->attach($hrdPermissions);

        // Assign permissions to Employee
        $employeeRole = Role::where('name', 'Employee')->first();
        $employeePermissions = Permission::whereIn('name', [
            'view_own_profile',
            'submit_leave_request',
        ])->get();
        $employeeRole->permissions()->attach($employeePermissions);
    }
}
