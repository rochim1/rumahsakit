<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TindakanDarurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakan_darurat', function (Blueprint $table) {
            $table->bigIncrements('id_tinDarurat');
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
        Schema::dropIfExists('tindakan_darurat');
    }
}
