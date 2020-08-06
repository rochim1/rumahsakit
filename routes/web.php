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
    return view('pages.content');
});
//menamai route sebagai induk , bisa di akses dengan route('induk') dengan hyperlink
Route::get('/home', array('as'=>'induk',function(){
    return view('pages.content');
}));
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/galeri', function () {
    return view('pages.galeri');
});
Route::get('/genteng', function () {
    return view('pages.genteng');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/signin', function () {
    return view('login.index');
});
Route::get('/adminPage', function () {
    return view('admin.content');
});
