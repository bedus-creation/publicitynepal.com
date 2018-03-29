<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    /**
     * Access All post related to this category
     */
    public function Posts(){
    	return $this->hasMany(\App\Post::class,"category");
    }

    /**
     * Relation to the child Category with Posts
     */
    public function child(){
    	return $this->hasMany(\App\Category::class,"parent")->with('Relations.Posts');
    }

    public function Relations(){
    	return $this->hasMany(\App\Relation::class,"category_id")->orderBy("id","DESC");
    }
}
