<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PekerjaanPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan_pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pekerjaan_pasien', 20);
        });

        Schema::table('pasien', function (Blueprint $table) {
            $table->foreign('pekerjaan')->references('id')->on('pekerjaan_pasien')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekerjaan_pasien');
    }
}
