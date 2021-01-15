@extends('layouts.site')
@section('title-block')СНТ НАРА@endsection('title-block')
@section('content')
    <div class="card mb-4 bg-primary">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Категория: {{ $post->category->name }}</li>
            <li class="list-group-item w-40" style="display: flex; justify-content: center;">
                <img src="{{ url('/storage/docs/' . $post->img) }}" class="image" alt="{{ $post->title }}" />
            </li>
            <li class="list-group-item">{{ Date::parse($post->created_at)->format('j F Y') }}</li>
            <li class="list-group-item">Название: <strong>{{ $post->title }}</strong></li>
            <li class="list-group-item">{{ $post->body }}</li>
        </ul>
    </div>
    <div class="card mb-4" style="padding:20px">
        <form method="POST" action="{{ route('comment', $post->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            @if(auth()->user())
                <p style="font-weight:600;font-size:14px">{{ Auth::user()->name }}</p>
                <div class="row">
                    <div class="col-2">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded float-start" width="100px">
                        <p style="font-size:10px">Зарегистрирован:<br>{{ Auth::user()->created_at->format('j F Y') }}</p>
                    </div>
                    <div class="col-10">
                        <textarea name="body" rows="4" id="body" class="form-control"
                                  placeholder="Введите ваш комментарий" required minlength="5"></textarea>
                        <input type="submit" value="Добавить комментарий" class="btn btn-md btn-success"
                               style="width:200px;height:40px;margin-top:10px;">
                    </div>
                </div>
            @endif
        </form>
    </div>
    <h5 style="margin-top:40px">Комментарии:</h5>
    @foreach($post->comments as $comment)
        <div class="card mb-4 bg-primary" style="margin-top:10px">
            <ul class="list-group list-group-flush">
                <li class="list-group-item w-40">
                    <p style="font-weight:600; font-size:14px">{{ $comment->user->name }}</p>
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}" class="rounded float-start" width="100px">
                            <p style="font-size:10px">Зарегистрирован:<br>{{ Date::parse($comment->user->created_at)->format('j F Y') }}</p>
                        </div>
                        <div class="col-10">
                            <p style="margin-bottom:10px;font-size:12px">{{ Date::parse($comment->created_at)->format('j F Y') }}</p>
                            <p>{{ $comment->body }}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item w-40">
                    <form method="POST" action="{{ route('reply', $comment->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        @if(auth()->user())
                            <p style="font-weight:700;margin-left:80px;font-size:14px;">{{ $comment->user->name }}</p>
                            <div class="row" style="margin-left:60px;">
                                <div class="col-2">
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded float-start" width="60px">
                                    <p style="font-size:8px">Зарегистрирован:<br>{{ Auth::user()->created_at->format('j F Y') }}</p>
                                </div>
                                <div class="col-10">
                                    <textarea name="body" rows="2" id="body" class="form-control" style="width:100%;margin-left:-30px;"
                                              placeholder="Ответьте на комментарий" required minlength="5"></textarea>
                                    <input type="submit" value="Ответить" class="btn btn-md btn-success"
                                           style="width:100px;height:35px;margin-bottom:10px;margin-left:-30px;margin-top:5px;">
                                </div>
                            </div>
                        @endif
                    </form>
                </li>
                @foreach($comment->replies as $reply)
                    <li class="list-group-item w-40">
                        <p style="font-weight:700;margin-left:80px;font-size:14px;">{{ $reply->user->name }}</p>
                        <div class="row" style="margin-left:60px;">
                            <div class="col-2">
                                <img src="{{ $reply->user->profile_photo_url }}" alt="{{ $reply->user->name }}" class="rounded float-start" width="60px">
                                <p style="font-size:8px">Зарегистрирован:<br>{{ Date::parse($reply->user->created_at)->format('j F Y') }}</p>
                            </div>
                            <div class="col-10">
                                <p style="font-size:12px;margin-left:-20px;">{{ Date::parse($reply->created_at)->format('j F Y') }}</p>
                                <p style="margin-left:-20px;margin-top:-10px;">{{ $reply->body }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection('content)
