<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User Management
        Permission::create(['name' => 'create_user', 'description' => 'Create a new user']);
        Permission::create(['name' => 'edit_user', 'description' => 'Edit a user']);
        Permission::create(['name' => 'delete_user', 'description' => 'Delete a user']);

        // Role Management
        Permission::create(['name' => 'manage_roles', 'description' => 'Manage roles and permissions']);

        // Payroll Management
        Permission::create(['name' => 'manage_payroll', 'description' => 'Manage payroll']);
    }
}
