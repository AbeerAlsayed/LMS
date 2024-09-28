<?php

use Illuminate\Support\Facades\Route;
use Modules\GradeManagement\Http\Controllers\GradeManagementController;

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
    Route::resource('grademanagement', GradeManagementController::class)->names('grademanagement');
});
