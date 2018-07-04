<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Action\Post\UpdatePostRequest;
use Illuminate\Support\Facades\DB;
use App\Relation;
use App\Category;
use App\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO --List
        // Implement Repository Pattern
        $data= Post::all();

        return view('action.posts.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::select(["id","name"])->get();
        return view('action.posts.postForm',["categories"=>json_encode($categories)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request["slug"]=\Str::slug($request->title);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'cover'=>'required',
            'categories'=>'required'
        ]);
        $post =new Post;
        $categories=json_decode($request->categories);
        try{
            $post->title=$request->title;
            $post->slug=$request->slug;
            $post->featured_photo=$request->cover;
            $post->content=$request->content;
            $post->user_id=Auth::User()->id;
            DB::transaction(function() use ($post,$categories){
                $post->save();
                foreach($categories as $item) {
                    $post->categories()->attach($item);
                }
            });
            $request->session()->flash("success","Post created Successfully");
        }catch(\Exception $e){
            return $request->session()->flash("error",$e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $selection=[];
        
        $selectedCategory = Relation::select("posts_id", "category_id")->where("posts_id", $id)->get();
        foreach ($selectedCategory as $item) {
            $selection[]=$item->category_id;
        }

        try{
            $data=Post::find($id);

        }catch(\Exception $e){
            return redirect()->back();
        }

        $categories=Category::select(["id","name"])->get();

        return view('action.posts.modals.edit',["data"=>$data,
        "selected"=>$selection,
        "categories"=>json_encode($categories)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $categories=json_decode($request->categories);
        try{
            $request=$request->merge(['user_id'=>Auth::User()->id,'slug'=>\Str::slug($request->title)]);
            DB::transaction(function() use ($id,$request,$categories){
                // fillable not working 
                $post=Post::where('id',$id)
                ->update($request->except(['_token','_method','files','categories']));
                
                // Drop All previous relations
                $dR=Relation::where('posts_id',$id)->delete();

                // Create New Relations
                foreach($categories as $item) {
                    $relation=new Relation;
                    $relation->posts_id=$id;
                    $relation->category_id=$item;
                    $relation->save();
                }
            });
            $request->session()->flash("success","Post Updated Successfully");
        }catch(\Exception $e){
            $request->session()->flash("error",$e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
