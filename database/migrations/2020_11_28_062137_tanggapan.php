<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tanggapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id('id_tanggapan');
            $table->unsignedBigInteger('id_pasien');
            // dibawah mendefinisikan relasi
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            // $table->foreignId('id_user')->constrained('users');
            // Constraint adalah batasan atau aturan yang ada pada table. Constraint mencegah penghapusan data dari suatu table yang mempunyai keterkaitan dengan table yang lain.
            $table->string('komentar', 250);
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
        Schema::dropIfExists('tanggapan');
    }
}
