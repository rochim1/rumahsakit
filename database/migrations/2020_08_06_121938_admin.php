<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin'); // sudah auto increment
            $table->string('nama')->comment('nama admin');
            $table->string('alamat', 200);
            $table->bigInteger('telpon');
            $table->string('email')->unique();
            $table->string('password')->default('sha1');
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
