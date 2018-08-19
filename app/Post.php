<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";

    protected $fillable=[
    	'title','user_id','slug','content','featured_photo'
    ];

    public function categories(){
    	return $this->belongsToMany(\App\Category::class);
    }

    public function relatedPostsByTag()
    {
        return Post::whereHas('categories', function ($query) {
            $tagIds = $this->categories()->pluck('categories.id')->all();
            $query->whereIn('categories.id', $tagIds);
        })->where('id', '<>', $this->id)
            ->orderBy('id','desc')->get();
    }
}
