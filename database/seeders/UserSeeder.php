<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
        ]);
        $superAdmin->roles()->attach(Role::where('name', 'Super Admin')->first());

        // HRD
        $hrd = User::create([
            'name' => 'HRD User',
            'email' => 'hrd@example.com',
            'password' => Hash::make('password'),
        ]);
        $hrd->roles()->attach(Role::where('name', 'HRD')->first());

        // Manager
        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
        ]);
        $manager->roles()->attach(Role::where('name', 'Manager')->first());

        // Employee
        $employee = User::create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('password'),
        ]);
        $employee->roles()->attach(Role::where('name', 'Employee')->first());

        // Finance
        $finance = User::create([
            'name' => 'Finance User',
            'email' => 'finance@example.com',
            'password' => Hash::make('password'),
        ]);
        $finance->roles()->attach(Role::where('name', 'Finance')->first());

        // Payroll Manager
        $payrollManager = User::create([
            'name' => 'Payroll Manager User',
            'email' => 'payroll@example.com',
            'password' => Hash::make('password'),
        ]);
        $payrollManager->roles()->attach(Role::where('name', 'Payroll Manager')->first());
    }
}
