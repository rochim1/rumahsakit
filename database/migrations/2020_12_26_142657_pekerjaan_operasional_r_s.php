<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PekerjaanOperasionalRS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan_OperasionalRS', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pekerjaan_operasional', 20);
            $table->string('job_desk')->nullable();
            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekerjaan_OperasionalRS');
    }
}
