<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->bigIncrements('id_kamar');
            $table->string('nama_kamar');

            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('bangsal');

            $table->boolean('status')->nullable();
            $table->string('keterangan')->nullable();

            $table->timestamps();
        });

        Schema::table('dokter', function ($table) {
            $table->bigInteger('jabatan')->unsigned()->change();
            $table->foreign('jabatan')->references('id_jabatan')->on('jabatan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamar');
    }
}
