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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Start admin
Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin'], function () {
    Route::get('/login', 'AuthController@showAdminLoginForm');
    Route::post('login', 'AuthController@adminLogin');
 });

Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin', 'middleware' => 'CheckAdmin'], function () { 
    Route::get('dashboard', 'HomeController@dashboard');
    Route::post('log-out','AuthController@adminLogOut')->name('admin.logout');
});
//End admin
