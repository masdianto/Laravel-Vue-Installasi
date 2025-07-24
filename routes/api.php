<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('employees', EmployeeController::class);
Route::get('employees/{employee}/movements', [EmployeeController::class, 'movements']);
Route::apiResource('attendances', AttendanceController::class);
Route::apiResource('leaves', LeaveController::class);
use App\Http\Controllers\EmployeeMovementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::apiResource('payrolls', PayrollController::class);
Route::apiResource('employee-movements', EmployeeMovementController::class);

Route::apiResource('roles', RoleController::class);
Route::post('roles/{role}/permissions', [RoleController::class, 'assignPermission']);
Route::delete('roles/{role}/permissions', [RoleController::class, 'revokePermission']);
use App\Http\Controllers\ShiftController;

Route::apiResource('permissions', PermissionController::class)->only(['index']);

use App\Http\Controllers\ZoneController;

Route::apiResource('shifts', ShiftController::class);
Route::post('shifts/{shift}/employees', [ShiftController::class, 'assignEmployee']);
Route::delete('shifts/{shift}/employees', [ShiftController::class, 'revokeEmployee']);

Route::apiResource('zones', ZoneController::class);
Route::post('zones/{zone}/employees', [ZoneController::class, 'assignEmployee']);
Route::delete('zones/{zone}/employees', [ZoneController::class, 'revokeEmployee']);
