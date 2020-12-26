<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asuransi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asuransi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_asuransi', 20);
            $table->text('telpon_asuransi')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('fax')->unique()->nullable();
            $table->string('keterangan_asuransi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asuransi');
    }
}
