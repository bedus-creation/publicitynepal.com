<?php
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Relation;

class HomeController extends Controller {
	public function index(Request $request){
		$posts=Category::where("parent",0)->with("Relations.Posts")->get();
		return response()->json($posts);
	}
	public function getPost(Request $request,$slug){
		$post=Post::where("slug",$request->slug)->first();
		return response()->json($post);
	}
	public function getMenus(Request $request){
		$categories=Category::where("parent",0)->get();
        return response()->json(["categories"=>$categories]);
	}
}