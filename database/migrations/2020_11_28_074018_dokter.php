<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->string('nama_dokter', 100);
            $table->string('NIK');
            $table->string('agama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nomor_str', 30)->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('telpon')->nullable();
            $table->string('password')->nullable();
            $table->char('jenis_kelamin', 10);
            $table->string('universitas')->nullable();
            $table->date('tanggal_lahir');
            $table->string('status_dokter')->nullable();
            $table->unsignedBigInteger('spesialis');

            $table->foreign('spesialis')->references('id_spesialis')->on('spesialis');

            $table->string('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->string('alasan_delete')->nullable();
            $table->softDeletes('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
}
