<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Reply;

class PostController extends Controller
{

    public function post(Post $id)
    {
        $post = Post::find($id)->first();

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

    public function reply(Request $request)
    {
        $reply = new Reply();
        $reply->user_id = auth()->user()->id;
        $reply->comment_id = $request->get('comment_id');
        $reply->post_id = $request->get('post_id');
        $reply->body = $request->input('body');
        $reply->save();

        return back()->with('success', 'Ваш ответ опубликован');
    }
}
