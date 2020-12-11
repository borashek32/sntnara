<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewsPost()
    {
        return view('reviews', ['reviews' => Review::all()]);
    }

    public function reviewsWrite(Request $req)
    {
        $review = new Review();
        $review->name    = $req->input('name');
        $review->review  = $req->input('review');
        $review->save();

        return redirect('reviews')->with('success', 'Ваше сообщение опубликовано');
    }
}
