<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadwalDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalDokter', function (Blueprint $table) {
            $table->bigIncrements('id');
            //membuat colom terlebih dahulu sebelum di buat foreign
            $table->bigInteger('id_dokter')->unsigned();
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_jam')->unsigned();
            $table->foreign('id_jam')->references('id')->on('jadwaljam')->onUpdate('cascade')->onDelete('cascade');
            $table->string('hari');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('jadwalDokter');
    }
}
