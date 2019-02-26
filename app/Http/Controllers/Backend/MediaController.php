<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class MediaController extends Controller
{
	public function upload(Request $request){
		 if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destination = 'uploads/images';
            return $file->move($destination, $request->file('image'));
            //$path=$request->file('image')->move(public_path().$destination, $request->file('image'));
            //return $request->image->store('public/uploads/images/'.$file->getMimeType());
            //return $file->store($destination);
            /*return Storage::putFile($destination,$request->file('image'));
            //$path = Storage::putFile('avatars', $request->file('image'));
            //return $path;
            */
        } else {
            return $request->file('image');
        }
	}
	public function getFiles(Request $request){
        $files = collect(\File::Files('uploads/images'))
            ->sortBy(function ($file) {
                return $file->getCTime();
            })
            ->map(function($file){
                return $file->getPath()."/".$file->getFilename();
            });
		return response()->json(["data"=>array_reverse($files->toArray())]);
	}
}
