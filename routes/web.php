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

Route::get('/', 'APIController@index')->middleware('isLogin')->name('sign_in');
Route::get('signin','APIController@signin')->name('signin');

Route::middleware('isAuth')->prefix("admin")->name("admin.")->group(function(){
    Route::get('dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('signout','AdminController@signout')->name('signout');
    Route::get('get_users','AdminController@get_users')->name('get_users');
    Route::get('get_user_role','AdminController@get_user_role')->name('get_user_role');
    Route::get('register_user','AdminController@register_user')->name('register_user');
    Route::get('submit_edit','AdminController@submit_edit')->name('submit_edit');
    Route::get('delete_user','AdminController@delete_user')->name('delete_user');
    Route::get('get_roles','AdminController@get_roles')->name('get_roles');
    Route::get('register_role','AdminController@register_role')->name('register_role');
    Route::get('delete_role','AdminController@delete_role')->name('delete_role');
    Route::get('submit_edit_role','AdminController@submit_edit_role')->name('submit_edit_role');
});