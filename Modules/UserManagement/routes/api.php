<?php

use Illuminate\Support\Facades\Route;
use Modules\UserManagement\Http\Controllers\UserController;
use Modules\UserManagement\Http\Controllers\UserManagementController;

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

//Route::prefix('users')->group(function () {
//    Route::get('/', [UserController::class, 'index']); // Fetch all users
//    Route::post('/', [UserController::class, 'store']); // Create a new user
//    Route::get('/{id}', [UserController::class, 'show']); // Fetch a specific user
//    Route::put('/{id}', [UserController::class, 'update']); // Update a specific user
//    Route::delete('/{id}', [UserController::class, 'destroy']); // Delete a specific user
//});

Route::apiResource('users', UserController::class);

