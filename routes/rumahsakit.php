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

Route::get('storage/{dir}/{dirdok}/{file}', function ($dir, $dirdok, $file) {
    $path = storage_path('app'
    . DIRECTORY_SEPARATOR . $dir
    . DIRECTORY_SEPARATOR . $dirdok
    . DIRECTORY_SEPARATOR . $file);
    return response()->file($path);
});

// route untuk API kota indonesia
Route::get('/daftarkota', 'kota@getKota');
Route::get('/daftarkelurahan/{id_kelurahan}', 'kota@getKelurahan');
Route::get('/daftarkabupaten/{id_kabupaten}', 'kota@getKabupaten');
Route::get('/daftarkecamatan/{id_kecamatan}', 'kota@getKecamatan');

// route untuk todolist :
Route::post('/todolist/create', 'todolistController@postCreate');
Route::get('/todolist/list', 'todolistController@getList');
Route::get('/todolist/update/{id}', 'todolistController@postUpdate');
Route::get('/todolist/delete/{id}', 'todolistController@getDelete');

// pasien
Route::group(['middleware' => 'authAdmin'], function () {
    Route::post('/test', 'rscontroller@test')->name('test');
    Route::post('/daftar_pasien', 'rscontroller@daftarPasien')->name('daftarPasien');
    // Route::post('/daftar_pasien', 'rscontroller@daftarPasien')->name('updatePasien');
    Route::get('/edit_pasien/{id}', 'rscontroller@editPasien')->name('editPasien');
    Route::get('/register_pasien', 'rscontroller@regpasien')->name('regpasien');
    Route::get('/attr_pasien', 'rscontroller@attr_pasien')->name('attr_pasien');
    Route::get('/deletedPasien', 'rscontroller@hapus_pasien')->name('pasienterhapus');
    Route::get('/master_pasien', 'rscontroller@masterpasien')->name('masterpasien');

    Route::get('/rekammedis', 'rscontroller@rekmed')->name('rekammedis');
    // dokter
    Route::post('/simpan_dokter', 'rscontroller@simpanDokter')->name('simpandokter');
    Route::get('/recent_dokter', 'rscontroller@recent_dokter')->name('recent_dokter');
    Route::get('/recentupdate_dokter', 'rscontroller@recentupdate_dokter')->name('recentupdate_dokter');
    Route::get('/tampil_dokter/{id}', 'rscontroller@tampil_dokter')->name('tampil_dokter');
    Route::get('/ambil_dokter/{id}', 'rscontroller@tampil_dokter')->name('tampil_dokterjadwal'); //untuk di view jadwal dokter
    Route::post('/update_dokter/{id}', 'rscontroller@updateDokter')->name('updateDokter');
    Route::delete('/hapus_dokter/{id}', 'rscontroller@hapus_dokter')->name('hapus_dokter');
    Route::get('/master_dokter', 'rscontroller@masterdokter')->name('masterdokter');
    Route::get('/tambah_dokter', 'rscontroller@tambahdokter')->name('tambahdokter');
    Route::post('/caridokter', 'rscontroller@caridokter')->name('caridokter');

    Route::post('/buatjadwal/{id}', 'rscontroller@buatjadwal')->name('buatjadwal');
    Route::get('/jadwaldokter', 'rscontroller@jadwaldokter')->name('jadwaldokter');
    Route::get('/ambil_jadwal/{id}', 'rscontroller@ambil_jadwal')->name('ambil_jadwal');
    Route::get('/spesialis', 'rscontroller@spesialis')->name('spesialis');
    Route::get('/ambiljadwaldokter', 'rscontroller@ambil_jadwaldokter')->name('ambil_jadwaldokter');

    Route::post('/simpan_spesialis', 'rscontroller@simpan_spesialis')->name('simpan_spesialis');
    Route::get('/tampil_spesialis', 'rscontroller@dataSpesialis_json')->name('tampil_spesialis');
    Route::post('/ambil_spesialis/{id}', 'rscontroller@ambil_spesialis')->name('ambil_spesialis');
    Route::post('/edit_spesialis/{id}', 'rscontroller@edit_spesialis')->name('edit_spesialis');
    Route::post('/hapus_spesialis/{id}', 'rscontroller@hapus_spesialis')->name('hapus_spesialis');

    Route::post('/simpan_jabatan', 'rscontroller@simpan_jabatan')->name('simpan_jabatan');
    Route::get('/tampil_jabatan', 'rscontroller@dataJabatan_json')->name('tampil_jabatan');
    Route::post('/ambil_jabatan/{id}', 'rscontroller@ambil_jabatan')->name('ambil_jabatan');
    Route::post('/edit_jabatan/{id}', 'rscontroller@edit_jabatan')->name('edit_jabatan');
    Route::post('/hapus_jabatan/{id}', 'rscontroller@hapus_jabatan')->name('hapus_jabatan');


    Route::get('/kamar', 'rscontroller@kamar')->name('kamar');
    Route::get('/tambah_kamar', 'rscontroller@tambah_kamar')->name('tambah_kamar');
    Route::get('/tampil_kamar', 'rscontroller@dataKamar_json')->name('tampil_kamar');
    Route::get('/prever_namakamar', 'rscontroller@prever_namakamar')->name('prever_namakamar');
    Route::post('/simpan_kamar', 'rscontroller@simpan_kamar')->name('simpan_kamar');
    Route::post('/ambil_kamar/{id}', 'rscontroller@ambil_kamar')->name('ambil_kamar');
    Route::post('/edit_kamar/{id}', 'rscontroller@edit_kamar')->name('edit_kamar');
    Route::post('/hapus_kamar/{id}', 'rscontroller@hapus_kamar')->name('hapus_kamar');

    Route::get('/dataBangsal', 'rscontroller@dataBangsal')->name('dataBangsal');
    Route::get('/ambil_bangsal/{id}', 'rscontroller@ambil_bangsal')->name('ambil_bangsal');
    Route::post('/simpan_bangsal', 'rscontroller@simpan_bangsal')->name('simpan_bangsal');
    Route::post('/edit_bangsal/{id}', 'rscontroller@edit_bangsal')->name('edit_bangsal');
    Route::post('/hapus_bangsal/{id}', 'rscontroller@hapus_bangsal')->name('hapus_bangsal');

    Route::get('/dataKelas', 'rscontroller@dataKelas')->name('dataKelas');
    Route::get('/ambil_kelas/{id}', 'rscontroller@ambil_kelas')->name('ambil_kelas');
    Route::post('/simpan_kelas', 'rscontroller@simpan_kelas')->name('simpan_kelas');
    Route::post('/edit_kelas/{id}', 'rscontroller@edit_kelas')->name('edit_kelas');
    Route::post('/hapus_kelas/{id}', 'rscontroller@hapus_kelas')->name('hapus_kelas');

    Route::get('/obat', 'rscontroller@obat')->name('obat');
    Route::get('/tambah_obat', 'rscontroller@tambah_obat')->name('tambah_obat');
    Route::get('/tampil_obat', 'rscontroller@dataObat_json')->name('tampil_obat');
    Route::post('/ambil_obat/{id}', 'rscontroller@ambil_obat')->name('ambil_obat');
    Route::post('/edit_obat/{id}', 'rscontroller@edit_obat')->name('edit_obat');
    Route::post('/simpan_obat', 'rscontroller@simpan_obat')->name('simpan_obat');
    Route::post('/hapus_obat/{id}', 'rscontroller@hapus_obat')->name('hapus_obat');

    Route::get('/tampil_kategoriobat', 'rscontroller@kategoriobat')->name('tampil_kategoriobat');
    Route::post('/ambil_kategori/{id}', 'rscontroller@ambil_kategori')->name('ambil_kategori');
    Route::post('/edit_kategori/{id}', 'rscontroller@edit_kategori')->name('edit_kategori');
    Route::post('/simpan_kategori', 'rscontroller@simpan_kategori')->name('simpan_kategori');
    Route::post('/hapus_kategori/{id}', 'rscontroller@hapus_kategori')->name('hapus_kategori');

    Route::get('/tampil_satuanobat', 'rscontroller@satuanobat')->name('tampil_satuanobat');
    Route::post('/ambil_satuan/{id}', 'rscontroller@ambil_satuan')->name('ambil_satuan');
    Route::post('/edit_satuan/{id}', 'rscontroller@edit_satuan')->name('edit_satuan');
    Route::post('/simpan_satuan', 'rscontroller@simpan_satuan')->name('simpan_satuan');
    Route::post('/hapus_satuan/{id}', 'rscontroller@hapus_satuan')->name('hapus_satuan');

    // Route::get('/tindakan', 'rscontroller@tindakan')->name('tindakan');
    Route::get('/tambah_tindakan', 'rscontroller@tambah_tindakan')->name('tambah_tindakan');
    Route::get('/tampil_tindakan', 'rscontroller@datatindakandokter')->name('tampil_tindakan');
    Route::get('/filter_tindakan/{id_spesialis}', 'rscontroller@filtertindakan')->name('tampil_tindakan');
    Route::post('/ambil_tindakan/{id}', 'rscontroller@ambil_tindakan')->name('ambil_tindakan');
    Route::post('/simpan_tindakan', 'rscontroller@simpan_tindakan')->name('simpan_tindakan');
    Route::post('/edit_tindakan/{id}', 'rscontroller@edit_tindakan')->name('edit_tindakan');

    Route::get('/jadwalsekarang', 'rscontroller@jadwalsekarang')->name('jadwal_sekarang');
    Route::post('/listdoktersekarang', 'rscontroller@listdoktersekarang')->name('listdoktersekarang');
    // Route::post('/simpan_tindakan', 'rscontroller@simpan_tindakan')->name('simpan_tindakan');
    // Route::post('/hapus_tindakan/{id}', 'rscontroller@hapus_tindakan')->name('hapus_tindakan');
    Route::get('/chart_hari', 'chart@chart_hari')->name('chart_hari');
});
