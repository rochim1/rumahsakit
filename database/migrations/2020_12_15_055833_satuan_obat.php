<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SatuanObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satuan_obat', function (Blueprint $table) {
            $table->bigIncrements('id_satuanObat');
            $table->string('nama_satuan');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::table('obat', function (Blueprint $table) {
            $table->foreign('satuan')->references('id_satuanObat')->on('satuan_obat')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kategori_obat')->references('id_katObat')->on('kategoriObat')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('satuan_obat');
    }
}
