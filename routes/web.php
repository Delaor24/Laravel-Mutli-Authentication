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
Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
  Route::get('/login','Auth\LoginController@ShowLoginForm')->name('admin.login');
  Route::post('/login-process','Auth\LoginController@login')->name('admin.login.process');

  Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
  
  Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

  Route::get('/', 'AdminController@index')->name('admin.home');
});
