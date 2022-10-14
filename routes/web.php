<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::any('/', 'App\Http\Controllers\Auth\AuthController@index');
Route::any('login', 'App\Http\Controllers\Auth\AuthController@index')->name('login');
Route::post('doLogin', 'App\Http\Controllers\Auth\AuthController@doLogin');
Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout')->name('logout');

Route::get('/reset-password', 'App\Http\Controllers\Auth\AuthController@getResetPassword');
Route::post('/resetPassword', 'App\Http\Controllers\Auth\AuthController@doResetPassword');
Route::get('/reset/{id}/{code}',  'App\Http\Controllers\Auth\AuthController@showReset');
Route::post('/reset', 'App\Http\Controllers\Auth\AuthController@doReset');
Route::group(['middleware' => 'auth','prefix' => 'admin'], function () {
    Route::group(['prefix' => 'staff'], function () {
        Route::get('/', [App\Http\Controllers\StaffController::class, 'index']);
        Route::get('/add', 'App\Http\Controllers\StaffController@add');
        Route::post('/store', 'App\Http\Controllers\StaffController@store');
    });
    Route::group(['prefix' => 'OT'], function () {
        Route::get('/', [App\Http\Controllers\OTController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\OTController::class, 'add']);
        Route::post('/store', [App\Http\Controllers\OTController::class, 'store']);
    });
    Route::group(['prefix' => 'administrative'], function () {
        Route::get('/',[App\Http\Controllers\AdministrativeController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\AdministrativeController::class, 'store']);
    });
    Route::group(['prefix' => 'outsource'], function () {
        Route::get('/', [App\Http\Controllers\OutsourceController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\OutsourceController::class, 'add']);
        Route::post('/store', [App\Http\Controllers\OutsourceController::class, 'store']);
    });
    Route::group(['prefix' => 'deployment'], function () {
        Route::get('/',function(){
            return view('admin.deployment.index');
        });
    });
    Route::group(['prefix' => 'project'], function () {
        Route::get('/', [App\Http\Controllers\ProjectController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\ProjectController::class, 'add']);
        Route::post('/store', [App\Http\Controllers\ProjectController::class, 'store']);
    });
    Route::group(['prefix' => 'resource'], function () {
        Route::get('/',function(){
            return view('admin.resource.index');
        });
    });
});
