<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admin';
    // karena default table oleh laravel "Admin" kita harus mendefinisikan pada table protected
}
