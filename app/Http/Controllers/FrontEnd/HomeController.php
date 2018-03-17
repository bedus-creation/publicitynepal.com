<?php
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Relation;

class HomeController extends Controller {



	public function index(Request $request){
		$categories=Category::where("parent",0)->with("Relations.Posts")->get();
		return view('front.index',["categories"=>$categories]);
	}


	/**
	 * Get a Post by slug
	 * @param Illuminate\Http|Request $request 
	 * @param $lug
	 */
	public function one(Request $request,$slug){
		$post=Post::where("slug",$request->slug)->first();
		return view('front.article.details',["post"=>$post]);
	}


	/**
	 *
	 */
	public function getMenus(Request $request){
		$categories=Category::where("parent",0)->get();
        return response()->json(["categories"=>$categories]);
	}
}