<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin'], function () {

    Route::controller(AuthController::class)->group(function () {
        Route::get('/',  'loginPage')->name('admin');
        Route::get('login',  'loginPage')->name('admin.login');
        Route::post('login',  'login');
        Route::post('logout',  'logout')->name('admin.logout');
        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.dashboard')->middleware('admin');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::group(['prefix' => 'students'], function () {
            Route::get('index', 'index')->name('admin.students.index')->middleware('admin');
            Route::get('create/{id?}', 'create')->name('admin.students.create')->middleware('admin');
            Route::get('show/{id?}', 'show')->name('admin.students.show')->middleware('admin');
            Route::post('store/{id?}', 'store')->name('admin.students.store')->middleware('admin');
            Route::get('delete/{id}', 'destroy')->name('admin.students.delete')->middleware('admin');
            Route::get('changestatus', 'changeStatus')->name('admin.students.change_status')->middleware('admin');
        });
    });

    Route::controller(SubjectController::class)->group(function () {
        Route::group(['prefix' => 'subjects'], function () {
            Route::get('index', 'index')->name('admin.subjects.index')->middleware('admin');
            Route::get('create/{id?}', 'create')->name('admin.subjects.create')->middleware('admin');
            Route::post('store/{id?}', 'store')->name('admin.subjects.store')->middleware('admin');
            Route::get('delete/{id}', 'destroy')->name('admin.subjects.delete')->middleware('admin');
        });
    });
});
