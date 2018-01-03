<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;	
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
	public function index(Request $request){
		$pots=Posts::orderBy('id', 'desc')
		->limit(5)->get();
		return response()->json(Posts::all());
	}
	public function createPost(Request $request){
		$product =new Product;
		try{
			$product->name=$request->title;
			$product->avatar=$request->featured_photo;
			$product->price=$request->content;
			$product->user_id=$request->user()->id;
			if($product->save()){
				echo "Post Created sucessfully  !";
			}
		}catch(\Exception $e){
			return response()->json($e->getMessage());
		}

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
