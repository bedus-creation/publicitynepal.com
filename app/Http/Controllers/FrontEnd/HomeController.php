<?php
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Relation;
use App\Advertisement;

class HomeController extends Controller {

	public function index(Request $request){
		$categories=Category::whereHas('posts',function($query){
			$query->orderBy('id','desc');
		})->with('posts')
			->orderBy('order','asc')->get();
		$advertisements=Advertisement::where('page','home')
			->orderBy('order','asc')->get();
		return view('front.index',["categories"=>$categories,"advertisement"=>$advertisements]);
	}


	/**
	 * Get a Post by slug
	 * @param Illuminate\Http|Request $request 
	 * @param $lug
	 */
	public function one(Request $request,$slug){

		$post=Post::findOrFail($slug);
		$post->views+=1;
		$post->save();

		$posts=$post->relatedPostsByTag();

		$advertisements=Advertisement::where('page','news')
			->orderBy('order','asc')->get();

		return view('front.article.details',["posts"=>$posts,"post"=>$post,'advertisement'=>$advertisements]);
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