<?php

use Illuminate\Support\Facades\Route;
use Modules\AttendanceManagement\Http\Controllers\AttendanceController;
use Modules\AttendanceManagement\Http\Controllers\AttendanceManagementController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/


Route::get('/attendance', [AttendanceController::class, 'index']);
Route::post('/attendance', [AttendanceController::class, 'store']);
Route::get('/attendance/{id}', [AttendanceController::class, 'show']);
Route::put('/attendance/{id}', [AttendanceController::class, 'update']);
Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);
