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
use Jenssegers\Date\Date;


class SiteController extends Controller
{

    public function news()
    {
        $posts = Post::latest()->simplePaginate(5);

        return view('site.news', compact('posts'));
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function map()
    {
        return view('site.map');
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
