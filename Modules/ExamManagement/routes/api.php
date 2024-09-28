<?php

use Illuminate\Support\Facades\Route;
use Modules\ExamManagement\Http\Controllers\ExamController;
use Modules\ExamManagement\Http\Controllers\ExamManagementController;

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

Route::get('/exams', [ExamController::class, 'index']);
Route::post('/exams', [ExamController::class, 'store']);
Route::get('/exams/{id}', [ExamController::class, 'show']);
Route::put('/exams/{id}', [ExamController::class, 'update']);
Route::delete('/exams/{id}', [ExamController::class, 'destroy']);
