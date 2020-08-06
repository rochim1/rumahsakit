<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('pembelian', function (Blueprint $table) {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->string('alamat', 200)->comment('alamat user untuk pengiriman');
            $table->bigInteger('telpon');
            $table->string('email')->unique();
            $table->string('previllage');
            $table->timestamp('email_verified_at')->nullable();
            // dapat dikosongi (null)
            $table->string('password');
            $table->rememberToken();
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
        //
    }
}
