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
            $table->string('rekam_medis')->unique();
            $table->string('nama')->comment('nama user');
            $table->string('jenisKelamin');
            $table->string('NIK')->unique();
            $table->string('warga_negara');
            $table->string('agama');
            $table->string('status_pasien')->nullable()->comment("status untuk saat ini apakah sedang dirawat atau tidak"); //rawat inap / rawat jalan
            $table->date('tanggal_lahir');
            $table->integer('umur_daftar')->nullable()->comment("dibutuhkan agar mengetahui umur pasien ketika mendaftar");
            $table->integer('lebih_bulan')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('telpon');
            $table->string('alamat')->nullable();

            $table->text('kelurahan')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kabupaten')->nullable();
            $table->text('provinsi')->nullable();

            $table->unsignedBigInteger('asuransi')->nullable();
            $table->integer('id_asuransi')->nullable()->comment('nanti dapat disesuaikan apakah type data ini sesuai');

            $table->unsignedBigInteger('pekerjaan')->nullable();

            $table->string('status_nikah')->nullable();

            $table->string('ciri_fisik')->nullable();
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
