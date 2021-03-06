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


// Route::post('/authAdmin', 'adminMainController@Auth')->name('log_admin');
Route::post('/authAdmin', 'adminMainController@Auth')->name('log_admin');
// Route::post('/authAdmin', function(){return "berhasil";})->name('log_admin');
Route::get('/admin/login', 'adminMainController@login')->name('loginadmin')->middleware('exeptForLoged');

// example : you can do like that :
// Route::get('/admin', 'adminMainController@index')->name('admin')->middleware('authAdmin'); or
Route::group(['middleware' => 'authAdmin'], function () {
    Route::get('/admin/logout', 'adminMainController@logout')->name('logoutadmin');

    Route::get('/content', 'adminMainController@content')->name('content');
    Route::get('/frontend', 'adminMainController@frontend')->name('landingpage');
    Route::get('/header', 'adminMainController@header')->name('header');
    Route::get('/footer', 'adminMainController@footer')->name('footer');

    Route::get('/admin', 'adminMainController@index')->name('admin');
    Route::get('/produk', 'adminMainController@produk')->name('listproduk');
    Route::get('/tambahproduk', 'adminMainController@tambahproduk')->name('tambahproduk');
    Route::get('/junkproduk', 'adminMainController@produkjunk')->name('produkjunk');

    Route::get('/konsumen', 'adminMainController@konsumen')->name('konsumen');
    Route::get('/adminlist', 'adminMainController@admin')->name('tampiladmin');
    Route::get('/users', 'adminMainController@users')->name('AllUsers');
});
