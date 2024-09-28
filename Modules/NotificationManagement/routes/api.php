<?php

use Illuminate\Support\Facades\Route;
use Modules\NotificationManagement\Http\Controllers\NotificationController;
use Modules\NotificationManagement\Http\Controllers\NotificationManagementController;

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

Route::get('/notifications/user/{userId}', [NotificationController::class, 'index']);  // List notifications for a user
Route::post('/notifications', [NotificationController::class, 'store']);  // Create a new notification
Route::get('/notifications/{id}', [NotificationController::class, 'show']);  // Show a specific notification
Route::put('/notifications/{id}', [NotificationController::class, 'update']);  // Mark as read or unread
Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);  // Delete a notification
