<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan', function(Blueprint $table){
            $table->id('id_detail_penjualan');
            $table->unsignedBigInteger('id_penjualan');
            $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualan');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->integer('harga_produk');
            $table->integer('jumlah');
            $table->integer('harga_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penjualan');
    }
}
