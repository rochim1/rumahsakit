<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PgungJawab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penanggungjawab', function (Blueprint $table) {
            $table->id('id_penaggungjawab'); // sudah auto increment

            $table->string("hubungan_keluarga")->nullable();
            $table->string("nama")->nullable();
            $table->string("NIK")->nullable();
            $table->string("pekerjaan")->nullable();
            $table->string("telpon")->nullable();
            $table->string("jenis_kelamin")->nullable();

            $table->text('kelurahan', 30);
            $table->text('kecamatan', 30);
            $table->text('kabupaten', 30);
            $table->text('provinsi', 30);
            $table->string("alamat")->nullable();

            $table->timestamps();
            $table->softDeletes('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penanggungjawab');
    }
}
