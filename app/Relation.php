<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table="relations";

    public function Posts(){
    	return $this->hasOne(\App\Post::class,"id","posts_id");
    }
}
