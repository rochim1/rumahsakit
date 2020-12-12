<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Obatpasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obatpasien', function (Blueprint $table) {
            $table->id('id_obatpasien');
            $table->bigInteger('id_obat')->unsigned();
            $table->foreign('id_obat')->references('id_obat')->on('obat')->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('id_rekammedis')->unsigned();
            $table->foreign('id_rekammedis')->references('id_rekammedis')->on('rekammedis')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamp('add_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obatpasien');
    }
}
