<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use App\Relation;

class ArticleController extends Controller
{
	public function postForm(Request $request){
		$categories=Category::select(["id","name"])->get();
		return view('action.posts.postForm',["categories"=>json_encode($categories)]);
	}
	public function postSave(Request $request){
		$request["slug"]=\Str::slug($request->title);
		$this->validate($request,[
			'title'=>'required',
			'slug'=>'required|min:3',
			'content'=>'required',
			'cover'=>'required',
			'categories'=>'required'
		]);
		$post =new Post;
		$categories=json_decode($request->categories);
		try{
			$post->title=$request->title;
			$post->slug=$request->slug;
			$post->featured_photo=$request->cover;
			$post->content=$request->content;
			$post->user_id=Auth::User()->id;
			DB::transaction(function() use ($post,$categories){
				$post->save();
				foreach($categories as $item) {
					$relation=new Relation;
					$relation->posts_id=$post->id;
					$relation->category_id=$item;
					$relation->save();
				}
			});
			$request->session()->flash("success","Post created Successfully");
		}catch(\Exception $e){
			return $request->session()->flash("error",$e->getMessage());
		}
		return redirect()->back();
	}public function postList(Request $request){
		$posts=Post::all();
		return view('action.posts.postList',["posts"=>$posts]);
	}
}
