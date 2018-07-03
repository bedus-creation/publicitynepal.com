<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	protected $repository;

	public function __construct(Category $category){
		$this->repository=$category;
	}

	public function index(){
		$categories=Category::all();
		return view('action.category.index',["categories"=>$categories]);
	}

	public function edit(Category $category){
		$categories=Category::all();
		return view('action.category.edit',["category"=>$category,"categories"=>$categories]);
	}

	/**
	 * Update a Model
	 * @param Illuminate\Http\Request $request
	 * @pram $id
	 */
	public function update(Request $request,$id){
		try{
			$this->repository->findOrFail($id)->update($request->all());
			\Session::flash('success','Category Updated Successfully');
			
		}catch(\Exception $e){
			\Session::flash('error','Something went wrong'.$e->getMessage());
		}
		return redirect()->back();
	}

    public function store(Request $request){
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
	
	/**
	 * 
	 */
    public function create(Request $request){
    	$categories=Category::all();
    	return view('action.category.cForm',["categories"=>$categories]);
    }
    public function cListJson(Request $request){
        $categories=Category::all();
        return response()->json(["categories"=>$categories]);
    }
    public function delete(Request $request){
		// Delete all the posts associate with this
        try{
            Category::where("id",$request->id)->delete();
            $request->session()->flash("success","Category is Deleted");
        }catch(\Exception $e){

        }
        return redirect()->back();
    }
}
