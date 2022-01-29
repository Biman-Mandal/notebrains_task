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

Route::view('/','user.login',['title'=>'User Sign-In']);
Route::resource('/user', 'UserController');
Route::post('user/login','UserController@login');

Route::group(['middleware'=>['userProduct']], function (){
    Route::resource('products', 'ProductController');
    Route::get('/logout', 'ProductController@logout');
});

Route::view('/administration','admin.admin',['title'=>'Administration']);
Route::post('admin/login','AdminController@login');

Route::group(['middleware'=>['adminLoginMiddleware']], function () {
    Route::resource('admin','AdminController');
    Route::get('admin-logout', 'AdminController@logout');
});
