<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fronts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('heading1');
            $table->text('sub_heading1');
            $table->string('fotoheading1');
            $table->string('heading2');
            $table->text('sub_heading2');
            $table->string('fotoheading2');
            $table->string('about');
            $table->string('footer_about');
            $table->string('nama');
            $table->string('alamat1');
            $table->string('alamat2');
            $table->string('telepon');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fronts');
    }
}
