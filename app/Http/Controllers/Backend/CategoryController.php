<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function cList(Request $request){
    	$categories=Category::all();
    	return view('action.category.cList',["categories"=>$categories]);
    }
    public function cSave(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'slug'=>'required|min:3'
    	]);
    	try{
    		$category=new Category;
    		$category->name=$request->name;
    		$category->parent=$request->parent;
    		$category->slug=$request->slug;
    		$category->bio=$request->bio;
    		$category->avatar=$request->avatar;
    		$category->cover=$request->cover;
    		$category->save();
    		$request->session()->flash("success","Category is added successfully");
    	}catch(\Exception $e){

    	}
    	return redirect()->back();
    }
    public function cForm(Request $request){
    	$categories=Category::all();
    	return view('action.category.cForm',["categories"=>$categories]);
    }
    public function cListJson(Request $request){
        $categories=Category::all();
        return response()->json(["categories"=>$categories]);
    }
    public function delete(Request $request){
        try{
            Category::where("id",$request->id)->delete();
            $request->session()->flash("success","Category is Deleted");
        }catch(\Exception $e){

        }
        return redirect()->back();
    }
}
