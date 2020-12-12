<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformasiPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasipasien', function (Blueprint $table) {
            $table->id('id_infopasien'); // sudah auto increment
            $table->unsignedBigInteger('id_pasien')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onUpdate('cascade')->onDelete('cascade');

            $table->string("asuransi")->nullable();
            $table->string("id_asuransi")->nullable();
            $table->string("cacat_fisik")->nullable();
            $table->string("bahasa")->nullable();

            $table->string("hubungan_keluarga")->nullable();
            $table->string("nama_keluarga")->nullable();
            $table->string("pekerjaan_keluarga")->nullable();
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
        Schema::dropIfExists('informasipasien');
    }
}
