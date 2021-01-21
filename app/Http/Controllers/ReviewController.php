<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    public function reviewsPost()
    {
        return view('site.reviews', ['reviews' => Review::all()]);
    }

    public function review(Review $id)
    {
        $review = Review::find($id)->first();

        return view('site.review', compact('review'));
    }

    public function __construct()
    {
        $this->middleware('auth')->except('reviewsPost', 'review');
    }

    public function reviewsWrite(Request $req)
    {
        $review             =    new Review();
        $review->user_id    =    auth()->user()->id;
        $review->review     =    $req->input('review');
        $review->save();

        return redirect('reviews')->with('success', 'Ваше сообщение опубликовано');
    }

    public function addOpinion(Request $request)
    {
        $opinion = new Opinion();
        $opinion->user_id = auth()->user()->id;
        $opinion->review_id = $request->get('review_id');
        $opinion->review_author_email = $request->get('review_author_email');
        $opinion->body = $request->input('body');
        $opinion->save();

        Mail::send(['text' => 'dynamic_email_get-opinions'], ['opinion' => $opinion], function ($message) use ($opinion) {
            $message->to($opinion->review_author_email)->subject('Получен ответ на ваш отзыв на сайте СНТ НАРА');
            $message->from('borashek29@gmail.com', 'СНТ НАРА');
        });

        return back()->with('success', 'Ваш комментарий опубликован');
    }
}
