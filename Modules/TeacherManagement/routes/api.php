<?php

use Illuminate\Support\Facades\Route;
use Modules\TeacherManagement\Http\Controllers\TeacherController;
use Modules\TeacherManagement\Http\Controllers\TeacherManagementController;

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

Route::apiResource('teachers', TeacherController::class);
