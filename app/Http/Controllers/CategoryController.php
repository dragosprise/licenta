<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {

      $categories = Category::all();
      $posts = Post::all();
//dd($post);
//    return response($categories);

        return view ('home',['categories'=>$categories,'post' => $posts]);

    }
    public function show(Category $category)
    {
        $title = $category->title;
        $body = $category->body;

        return view('viewcategory', compact('title','body'));
    }
}
