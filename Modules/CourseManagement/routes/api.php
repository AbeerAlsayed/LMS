<?php

use Illuminate\Support\Facades\Route;
use Modules\CourseManagement\Http\Controllers\CourseController;
use Modules\CourseManagement\Http\Controllers\CourseManagementController;

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
Route::apiResource('courses', CourseController::class);
