<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class, 'index']);

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::view('index', 'admin/index')->name('admin.index');
    Route::resource('department', DepartmentController::class, ['except' => [ 'show' ]]);
    Route::resource('employee', EmployeeController::class, ['except' => [ 'show' ]]);
});



