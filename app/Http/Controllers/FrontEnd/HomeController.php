<?php
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Relation;

class HomeController extends Controller {



	public function index(Request $request){
		$categories=Category::whereHas('posts')->with('posts')
			->get();
		return view('front.index',["categories"=>$categories]);
	}


	/**
	 * Get a Post by slug
	 * @param Illuminate\Http|Request $request 
	 * @param $lug
	 */
	public function one(Request $request,$slug){
		try{
			$post=Post::where("id",$request->slug)->first();
			$post->views+=1;
			$post->save();
		}catch(\Exception $e){

		}

		return view('front.article.details',["post"=>$post]);
	}

	/**
	 * Get a Category
	 */
	public function category($category){
		$data=null;
		try{
			$data=Category::where('slug',$category)
			->with('child')
			->with('posts')->first();
			
		}catch(\Exception $e){
			// redirect to error page
		}
		return view('front.category.index',["category"=>$data]);
	}


	/**
	 *
	 */
	public function getMenus(Request $request){
		$categories=Category::where("parent",0)->get();
        return response()->json(["categories"=>$categories]);
	}
}