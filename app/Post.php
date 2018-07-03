<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";

    protected $fillable=[
    	'title','user_id','slug','content'
    ];

    public function categories(){
    	return $this->belongsToMany(\App\Category::class);
    }
}
