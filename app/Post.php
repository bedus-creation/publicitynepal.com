<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";

    public function Category(){
    	return $this->belongsTo(\App\Category::class);
    }
}
