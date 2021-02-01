<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('news', 'contact', 'map', 'docs');
    }

    public function news()
    {
        $categories = Category::all();
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('body', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->latest()
                ->simplePaginate(5);
        } else {
            $posts = Post::latest()->simplePaginate(5);
        }

        return view('site.news', compact('categories', 'posts'));
    }

    public function contact()
    {
        $categories = Category::all();

        return view('site.contact', compact('categories'));
    }

    public function map()
    {
        $categories = Category::all();

        return view('site.map', compact('categories'));
    }

    public function docs()
    {
        //return view('site.docs');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'subject' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:500'],
        ]);
    }

    public function submit(Request $data)
    {
        $data = array(
            'name' => $data->name,
            'email' => $data->email,
            'subject' => $data->subject,
            'message' => $data->message,
        );

        Mail::to("borashek@inbox.ru")->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено.');
    }
}
