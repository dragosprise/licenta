<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $this->shareViewData();
    }

    protected function shareViewData()
    {
    $categories = Category::all();
    $posts = Post::all();
        view()->share('categories', $categories);
        view()->share('post', $posts);
    }
}

