<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles"; //nama table di database
    protected $fillable = ['title', 'content']; //nama yang dapat disi
}
