<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Action\Post\UpdatePostRequest;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;
use Auth;

class PostController extends Controller
{
    protected $repository;

    public function __construct(Post $posts)
    {
        $this->repository=$posts;
    }


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

        try{
            $data=Post::with('categories')->find($id);

        }catch(\Exception $e){
            return redirect()->back();
        }

        $categories=Category::select(["id","name"])->get();        

        return view('action.posts.modals.edit',[
            "data"=>$data,
            "categories"=>json_encode($categories),
            "selected"=>$data->categories->pluck('id')
        ]);
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
                $post=Post::find($id);
                $post->update($request->except(['_token','_method','files','categories']));
                
                // Drop All previous relations
                $post->categories()->detach();

                // Create New Relations
                foreach($categories as $item) {
                    $post->categories()->attach($item);
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
        if ($this->repository->find($id)) {
            $this->repository->find($id)->categories()->detach();
            $this->repository->find($id)->delete();
            \Session::flash("success", "Data is successfully deleted.");
        } else {
            \Session::flash("error", "Something went wrong");
        }
        return redirect()->back();
    }
}
