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

            // $table->unsignedBigInteger('id_penaggungjawab');
            // $table->foreign('id_penaggungjawab')->references('id_penaggungjawab')->on('penaggungjawab')->onUpdate('cascade')->onDelete('cascade');


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
        //
    }
}
