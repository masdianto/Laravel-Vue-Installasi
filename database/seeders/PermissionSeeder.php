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
        Permission::create(['name' => 'view_payroll', 'description' => 'View payroll']);
        Permission::create(['name' => 'edit_payroll', 'description' => 'Edit payroll']);
        Permission::create(['name' => 'approve_payroll', 'description' => 'Approve payroll']);

        // Finance
        Permission::create(['name' => 'view_financial_reports', 'description' => 'View financial reports']);

        // Employee
        Permission::create(['name' => 'view_own_profile', 'description' => 'View own profile']);
        Permission::create(['name' => 'submit_leave_request', 'description' => 'Submit a leave request']);

        // Shift Management
        Permission::create(['name' => 'manage_shifts', 'description' => 'Manage shifts']);

        // Zone Management
        Permission::create(['name' => 'manage_zones', 'description' => 'Manage zones']);
    }
}
