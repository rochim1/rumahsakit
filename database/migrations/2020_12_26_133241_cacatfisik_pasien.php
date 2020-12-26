<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CacatfisikPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cacatfisik_pasien', function (Blueprint $table) {
            $table->bigIncrements('id_cacatfisik_pasien');

            $table->unsignedBigInteger('id_cacatfisik');
            $table->foreign('id_cacatfisik')->references('id_cacatfisik')->on('cacatfisik')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onUpdate('cascade')->onDelete('cascade');

            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cacatfisik_pasien');
    }
}
