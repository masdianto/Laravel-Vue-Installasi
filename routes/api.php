<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ==========================
// Controllers (Pastikan semua file ini ada)
// ==========================
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeMovementController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ZoneController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| All routes defined here are automatically assigned the "api" middleware
| group and loaded by the RouteServiceProvider.
|
*/

// ==========================
// Authenticated User Info
// ==========================
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ==========================
// Employees
// ==========================
Route::apiResource('employees', EmployeeController::class);
Route::get('employees/{employee}/movements', [EmployeeController::class, 'movements']);

// ==========================
// Attendances
// ==========================
Route::apiResource('attendances', AttendanceController::class);

// ==========================
// Leaves
// ==========================
Route::apiResource('leaves', LeaveController::class);

// ==========================
// Payrolls
// ==========================
Route::apiResource('payrolls', PayrollController::class);

// ==========================
// Employee Movements
// ==========================
Route::apiResource('employee-movements', EmployeeMovementController::class);

// ==========================
// Roles & Permissions
// ==========================
Route::apiResource('roles', RoleController::class);
Route::post('roles/{role}/permissions', [RoleController::class, 'assignPermission']);
Route::delete('roles/{role}/permissions', [RoleController::class, 'revokePermission']);

Route::apiResource('permissions', PermissionController::class)->only(['index']);

// ==========================
// Shifts
// ==========================
Route::apiResource('shifts', ShiftController::class);
Route::post('shifts/{shift}/employees', [ShiftController::class, 'assignEmployee']);
Route::delete('shifts/{shift}/employees', [ShiftController::class, 'revokeEmployee']);

// ==========================
// Zones
// ==========================
Route::apiResource('zones', ZoneController::class);
Route::post('zones/{zone}/employees', [ZoneController::class, 'assignEmployee']);
Route::delete('zones/{zone}/employees', [ZoneController::class, 'revokeEmployee']);
