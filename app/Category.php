<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    public function Relations(){
    	return $this->hasMany(\App\Relation::class,"category_id")->orderBy("id","DESC");
    }
}
