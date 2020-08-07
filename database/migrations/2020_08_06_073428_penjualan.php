<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('penjualan', function (Blueprint $table) {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');
            // ->onDelete('cascade') tidak ada karena agar user yang memiliki riwayat transaksi tidak bisa dihapus
            //  $table->foreignId('user_id')->constrained('users'); juga bisa
            $table->date('jadwal_pengiriman')->nullable();
            $table->bigInteger('total_harga');
            $table->bigInteger('bayar');
            $table->bigInteger('kembalian');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
