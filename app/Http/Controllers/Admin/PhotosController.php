<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
    	$this->validate(request(), [
    		'photo' => 'required|image|max:2048'
    	]);
    	$post->photos()->create([
            'url' => '/storage/'.request()->file('photo')->store('posts','public'),
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return back()->with('flash', 'Foto Eliminada');
    }
}
