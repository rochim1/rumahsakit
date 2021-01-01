<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rekammedis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekammedis', function (Blueprint $table) {
            $table->id('id_rekammedis');
            $table->bigInteger('id_pasien')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('spesialis');
            $table->foreign('spesialis')->references('id_spesialis')->on('spesialis')->onUpdate('cascade')->onDelete('cascade');

            $table->string('keluhan');

            $table->string('suhu_tubuh')->nullable();
            $table->string('BB')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('nadi')->nullable();
            $table->string('tekakanDarah')->nullable();
            $table->string('golDarah')->nullable();
            $table->string('tambahan')->nullable();

            $table->string('diagnosa awal');
            $table->string('diagnosa akhir')->nullable();

            $table->string('tindakan_lanjutan')->comment('rawat inap atau rawat jalan');
            $table->string('keterangan')->nullable();
            $table->boolean('confirmed')->default(false)->comment("apabila sudah ditangani oleh perawat untuk data2 tambahan BB/tensi");
            $table->string('status')->default('pending')->comment("pending atau finish");

            // $table->unsignedBigInteger('id_penaggungjawab')->comment('apabila rawat inap');
            // $table->foreign('id_penaggungjawab')->references('id_penaggungjawab')->on('penaggungjawab')->onUpdate('cascade')->onDelete('cascade');

            $table->time('waktu_periksa');
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
        Schema::dropIfExists('rekammedis');
    }
}
