<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Carbon\Carbon;

class PostController extends Controller
{

    public function show(Post $post)
    {

        if (!$post->active || $post->created_at > Carbon::now()) {
            throw new NotFoundHttpException();
        }


        $title = $post->title;
        $body = $post->body;

        return view('viewpost', compact('title','body'));
    }




//    public function search(Request $request)
//    {
//        $q = $request->get('q');
//
//        $posts = Post::query()
//            ->where('active', '=', true)
//            ->whereDate('published_at', '<=', Carbon::now())
//            ->orderBy('published_at', 'desc')
//            ->where(function ($query) use ($q) {
//                $query->where('title', 'like', "%$q%")
//                    ->orWhere('body', 'like', "%$q%");
//            })
//            ->paginate(10);
//
//        return view('post.search', compact('posts'));
//    }
}
