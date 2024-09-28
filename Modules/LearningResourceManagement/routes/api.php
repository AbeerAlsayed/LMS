<?php

use Illuminate\Support\Facades\Route;
use Modules\LearningResourceManagement\Http\Controllers\LearningResourceController;
use Modules\LearningResourceManagement\Http\Controllers\LearningResourceManagementController;

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


Route::get('/learning-resources', [LearningResourceController::class, 'index']);
Route::post('/learning-resources', [LearningResourceController::class, 'store']);
Route::get('/learning-resources/{id}', [LearningResourceController::class, 'show']);
Route::put('/learning-resources/{id}', [LearningResourceController::class, 'update']);
Route::delete('/learning-resources/{id}', [LearningResourceController::class, 'destroy']);
