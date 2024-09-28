<?php

use Illuminate\Support\Facades\Route;
use Modules\ParentManagement\Http\Controllers\ParentManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('parentmanagement', ParentManagementController::class)->names('parentmanagement');
});
