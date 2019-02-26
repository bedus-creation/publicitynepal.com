<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    protected $fillable=[
        'name','group','bio','avatar','order','slug'
    ];

    /**
     * Access All post related to this category
     */
    public function posts(){
    	return $this->belongsToMany(\App\Post::class)->orderBy('id','DESC');
    }

    /**
     * Relation to the child Category with Posts
     */
    public function child(){
    	return $this->hasMany(\App\Category::class,"parent")->with('Relations.Posts');
    }
}
