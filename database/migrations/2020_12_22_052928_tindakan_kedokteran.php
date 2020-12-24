<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TindakanKedokteran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakan_kedokteran', function (Blueprint $table) {
            $table->bigIncrements('id_tinDokter');
            $table->unsignedBigInteger('id_spesialis');
            $table->foreign('id_spesialis')->references('id_spesialis')->on('spesialis')->onUpdate('cascade')->onDelete('cascade');;
            $table->string('nama_tindakan');
            $table->integer('harga_tindakan');
            $table->string('keterangan_tindakan');
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
        Schema::dropIfExists('tindakan_kedokteran');
    }
}
