<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;

class ArticleController extends Controller
{
	public function postForm(Request $request){
		return view('action.posts.postForm');
	}
	public function postSave(Request $request){
		$this->validate($request,[
			'title'=>'required',
			'content'=>'required',
			'cover'=>'required'
		]);
		$post =new Post;
		try{
			$post->title=$request->title;
			$post->slug=\Str::slug($request->title);
			$post->featured_photo=$request->cover;
			$post->content=$request->content;
			$post->user_id=Auth::User()->id;
			if($post->save()){
				$request->session()->flash("success","Post created Successfully");
			}
		}catch(\Exception $e){
			return $request->session()->flash("error",$e->getMessage());
		}
		return redirect()->back();
	}public function postList(Request $request){
		return view('action.posts.postList');
	}
}
