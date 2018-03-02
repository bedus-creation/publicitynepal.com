<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function postForm(Request $request){
    	return view('action.posts.postForm');
    }
    public function postSave(Request $request){
    	
    }public function postList(Request $request){
    	return view('action.posts.postList');
    }
}
