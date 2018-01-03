<?php
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller {
	public function index(Request $request){
		$products=Post::orderBy('id', 'DESC')
		->limit(20)->get();
		return response()->json($products);
	}
}