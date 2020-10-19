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
// pasien

Route::get('/register_pasien', 'rscontroller@regpasien')->name('regpasien');
Route::get('/master_pasien', 'rscontroller@masterpasien')->name('masterpasien');

// dokter
Route::get('/master_dokter', 'rscontroller@masterdokter')->name('masterdokter');
Route::get('/jadwal_dokter', 'rscontroller@masterdokter')->name('jadwaldokter');
Route::get('/tambah_dokter', 'rscontroller@tambahdokter')->name('tambahdokter');
