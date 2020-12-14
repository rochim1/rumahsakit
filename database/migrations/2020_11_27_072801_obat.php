<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Obat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id('id_obat');
            $table->string('nama_obat');
            $table->string('kategori_obat');
            $table->string('kadaluarsa')->nullable();
            $table->string('satuan')->nullable();
            $table->integer('harga_obat');
            $table->longText('deskripsi_obat')->nullable();
            $table->integer('stock');
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
        Schema::dropIfExists('obat');
    }
}