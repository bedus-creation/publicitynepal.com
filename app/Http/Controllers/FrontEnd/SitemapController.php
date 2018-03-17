<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class SitemapController extends Controller
{

    public function index(Request $request){
    	$posts=Post::all();
    	$content = view('seo.sitemap', ["posts"=>$posts]);
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
