<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien'); // sudah auto increment
            $table->string('rekam_medis');
            $table->string('nama')->comment('nama user');
            $table->string('jenisKelamin');
            $table->string('NIK');
            $table->string('warga_negara');
            $table->string('agama');
            $table->string('status_pasien')->nullable()->comment("status untuk saat ini apakah sedang dirawat atau tidak"); //rawat inap / rawat jalan
            $table->date('tanggal_lahir');
            $table->integer('umur_daftar')->nullable()->comment("dibutuhkan agar mengetahui umur pasien ketika mendaftar");
            $table->integer('lebih_bulan')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('telpon');
            $table->string('alamat')->nullable();
            $table->text('kelurahan');
            $table->text('kecamatan');
            $table->text('kabupaten');
            $table->text('provinsi');

            $table->text('asuransi')->nullable();
            $table->text('id_asuransi')->nullable();

            $table->string('pekerjaan')->nullable();
            $table->string('status_nikah')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // dapat dikosongi (null)
            $table->string('password');
            $table->rememberToken()->nullable();
            // remember token digunakan untuk fungsi remember me
            $table->timestamps();

            $table->string('alasan_hapus')->nullable();
            $table->softDeletes('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
