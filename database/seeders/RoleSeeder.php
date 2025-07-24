<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin', 'description' => 'Has all permissions']);
        Role::create(['name' => 'HRD', 'description' => 'Manages HR-related tasks']);
        Role::create(['name' => 'Manager', 'description' => 'Manages a team of employees']);
        Role::create(['name' => 'Employee', 'description' => 'A regular employee']);
        Role::create(['name' => 'Finance', 'description' => 'Manages financial tasks']);
        Role::create(['name' => 'Payroll Manager', 'description' => 'Manages employee payroll']);
    }
}
