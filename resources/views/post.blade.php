@extends('layouts.site')
@section('title-block')СНТ НАРА@endsection('title-block')
@section('content')
    @foreach($post as $post)
        <div class="card mb-4 bg-primary">
            <ul class="list-group list-group-flush">
                <li class="list-group-item w-40">
                    <img src="{{ url('/storage/docs/' . $post->img) }}" class="w-100" alt="{{ $post->title }}" />
                </li>
                <li class="list-group-item">{{ Date::parse($post->created_at)->format('j F Y') }}</li>
                <li class="list-group-item">{{ $post->title }}</li>
                <li class="list-group-item">{{ $post->body }}</li>
            </ul>
        </div>
    @endforeach
    <div class="card mb-4" style="padding:20px">
        <form method="POST" action="{{ route('comment', $post->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{ $post->id }}">
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
            </ul>
        </div>
    @endforeach
@endsection('content)
