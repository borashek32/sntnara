<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\User;

class ReviewController extends Controller
{
    public function reviewsPost(User $id)
    {
        return view('reviews', ['reviews' => Review::all()]);
    }


    public function __construct()
    {
        $this->middleware('auth')->except('reviewsPost');
    }


    public function reviewsWrite(Request $req)
    {
        $review             =    new Review();
        $review->user_id    =    auth()->user()->id;
        $review->review     =    $req->input('review');
        $review->save();

        return redirect('reviews')->with('success', 'Ваше сообщение опубликовано');
    }
}
