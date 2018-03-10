<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;	
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	public function index(Request $request){
		return response()->json(Posts::all());
	}
	public function createPost(Request $request){
		$post =new Post;
		try{
			$post->title=$request->title;
			$post->slug=Str::slug($request->title);
			$post->featured_photo=$request->featured_photo;
			$post->content=$request->content;
			$post->user_id=$request->user()->id;
			if($post->save()){
				$request->session()->flash("","Post created Successfully");
			}
		}catch(\Exception $e){
			return response()->json($e->getMessage());
		}
		return redirect()->back();

	}
	public function uploadImage(Request $request){
		If($request->file('file')->isValid()){
			$destinationPath = 'uploads';
			$fileName = $request->file('file')->getClientOriginalName();
			$request->file('file')->move($destinationPath, $fileName);
			echo  $fileName;
		}
	}
}
