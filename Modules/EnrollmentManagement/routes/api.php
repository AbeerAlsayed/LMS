<?php

use Illuminate\Support\Facades\Route;
use Modules\EnrollmentManagement\Http\Controllers\EnrollmentController;
use Modules\EnrollmentManagement\Http\Controllers\EnrollmentManagementController;

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


Route::get('/enrollments', [EnrollmentController::class, 'index']);
Route::post('/enrollments', [EnrollmentController::class, 'store']);
Route::get('/enrollments/{id}', [EnrollmentController::class, 'show']);
Route::put('/enrollments/{id}', [EnrollmentController::class, 'update']);
Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy']);
