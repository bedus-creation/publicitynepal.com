<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";

    protected $fillable=[
    	'title','user_id','slug','content'
    ];

    public function Category(){
    	return $this->belongsTo(\App\Category::class);
    }
}
