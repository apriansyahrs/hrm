<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BasicSalaryController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DesignationController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\LeaveTypeController;
use App\Http\Controllers\Api\PayrollController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ShiftController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// login
Route::post('/login', [AuthController::class, 'login']);
// logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
//roles
Route::apiResource('/roles', RoleController::class)->middleware('auth:sanctum');
//departments
Route::apiResource('/departments', DepartmentController::class)->middleware('auth:sanctum');
//designations
Route::apiResource('/designations', DesignationController::class)->middleware('auth:sanctum');
//shifts
Route::apiResource('/shifts', ShiftController::class)->middleware('auth:sanctum');
//basic salaries
Route::apiResource('/basic-salaries', BasicSalaryController::class)->middleware('auth:sanctum');
//holidays
Route::apiResource('/holidays', HolidayController::class)->middleware('auth:sanctum');
//leave types
Route::apiResource('/leave-types', LeaveTypeController::class)->middleware('auth:sanctum');
//leaves
Route::apiResource('/leaves', LeaveController::class)->middleware('auth:sanctum');
//attendances
Route::apiResource('/attendances', AttendanceController::class)->middleware('auth:sanctum');
//payrolls
Route::apiResource('/payrolls', PayrollController::class)->middleware('auth:sanctum');

