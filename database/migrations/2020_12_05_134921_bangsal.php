<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bangsal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangsal', function (Blueprint $table) {
            $table->bigIncrements('id_bangsal');
            $table->string('bangsal');
            $table->string('lantai')->nullable();
            $table->timestamps();
        });

        Schema::table('kamar', function (Blueprint $table) {
            $table->foreign('bangsal')->references('id_bangsal')->on('bangsal')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bangsal');
        //
    }
}
