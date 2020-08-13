<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // sudah auto increment
            $table->string('nama')->comment('nama user');
            $table->string('alamat', 200)->comment('alamat user untuk pengiriman')->nullable();
            $table->text('telpon')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // dapat dikosongi (null)
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
