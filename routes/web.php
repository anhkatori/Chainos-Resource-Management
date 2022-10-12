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

Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index']);
Route::get('/OT',function(){
    return view('admin.OT.index');
});
Route::get('/administrative',function(){
    return view('admin.administrative.index');
});
Route::get('/outsource',function(){
    return view('admin.outsource.index');
});
Route::get('/deployment',function(){
    return view('admin.deployment.index');
});
Route::get('/project',function(){
    return view('admin.project.index');
});
Route::get('/resource',function(){
    return view('admin.resource.index');
});
