<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	// return $category->load('posts'); opcion
    	// $post = $category->posts;opcion
    	// return view('welcome', compact('category')) opcion

    	return view('pages.home', [
    		'title' => "Publicaciones de la Categoria: '{$category->name}'",
    		'posts' => $category->posts()->published()->paginate()
    	]);
    }
}
