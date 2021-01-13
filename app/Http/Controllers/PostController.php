<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class PostController extends Controller
{

    public function post(Post $id)
    {
        $post = Post::find($id)->first();
//        $category = Category::where('id', '=', 'category_id')->get();
//dd($post);

        return view('site.post', compact('post'));
    }


    public function __construct()
    {
        $this->middleware('auth')->except('post');
    }


    public function addComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->get('post_id');
        $comment->body = $request->input('body');
        $comment->save();

        return back()->with('success', 'Ваш комментарий опубликован');
    }
}
