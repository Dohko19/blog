<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        $post->load('owner', 'category', 'tags', 'photos');
    	if ($post->isPublished() || auth()->check()) {

    		if (request()->wantsJson())
    		{
    			return $post;
    		}
    		return view('posts.show', compact('post'));
    	}

    	abort(404);
    }
}
