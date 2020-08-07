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
            $table->foreignId('id_penjualan')->constrained('penjualan');
            $table->foreignId('id_produk')->constrained('produk');
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
        //
    }
}
