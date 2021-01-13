@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <h3>Категория: {{ $category->name }}</h3>
    @foreach($category->posts as $post)
        <div class="card mb-4 bg-primary">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Категория: {{ $category->name }}</li>
                <li class="list-group-item w-40" style="display: flex; justify-content: center;">
                    <img src="{{ url('/storage/docs/' . $post->img) }}" class="image" alt="{{ $post->title }}" />
                </li>
                <li class="list-group-item">{{ Date::parse($post->created_at)->format('j F Y') }}</li>
                <li class="list-group-item">
                    <a href="{{ route('post', $post->id) }}">
                        Название:
                        <strong>
                            {{ $post->title }}
                        </strong>
                    </a>
                </li>
                <li class="list-group-item" style="white-space: pre-wrap;">{{ $post->body }}</li>
                <li class="list-group-item"><a href="{{ route('post', $post->id) }}">Комментарии</a></li>
            </ul>
        </div>
    @endforeach
    <div class="text-center">
        {{ $posts->links() }}
    </div>
@endsection('content)
