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
                <h6>{{ Auth::user()->name }}</h6>
            @endif
            <textarea name="body" rows="3" id="body" class="form-control"
                      placeholder="Введите ваш комментарий" required minlength="5"></textarea>
            <input type="submit" value="Добавить комментарий" class="btn btn-md btn-success"
                   style="width:200px;height:40px;margin-top:10px;">
        </form>
    </div>
    <h5 style="margin-top:40px">Комментарии:</h5>
    @foreach($post->comments as $comment)
        <div class="card mb-4 bg-primary" style="margin-top:10px">
            <ul class="list-group list-group-flush">
                <li class="list-group-item w-40">
                    {{ $comment->user->name }}
                    <p style="font-size:12px">
                        {{ Date::parse($comment->created_at)->format('j F Y') }}
                    </p>
                </li>
                <li class="list-group-item w-40">{{ $comment->body }}</li>
                <li class="list-group-item w-40">
                    <form method="POST" action="{{ route('reply', $comment->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        @if(auth()->user())
                            <h6 style="margin-left:20px;margin-top:20px">{{ Auth::user()->name }}</h6>
                        @endif
                        <textarea name="body" rows="2" id="body" class="form-control" style="margin-left:20px;"
                                  placeholder="Ответьте на комментарий" required minlength="5"></textarea>
                        <input type="submit" value="Ответить" class="btn btn-md btn-success"
                               style="width:100px;height:35px;margin-bottom:10px;margin-top:5px;margin-left:20px;">
                    </form>
                </li>
{{--                @foreach($comment->replies as $reply)--}}
{{--                    <li class="list-group-item w-40" style="margin-left:20px;">--}}
{{--                        {{ $reply->user->name }}--}}
{{--                        <p style="font-size:12px">--}}
{{--                            {{ Date::parse($reply->created_at)->format('j F Y') }}--}}
{{--                        </p>--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item w-40" style="margin-left:20px;">{{ $reply->body }}</li>--}}
{{--                @endforeach--}}
            </ul>
        </div>
    @endforeach
@endsection('content)
