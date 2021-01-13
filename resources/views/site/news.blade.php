@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <h2>Новости</h2>
    @forelse($posts as $post)
        <div class="card mb-4 bg-primary">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Категория: {{ $post->category->name }}</li>
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
    @empty
        <p class="text-center">
            Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
        </p>
    @endforelse
    <div class="text-center">
        {{ $posts->appends(['search' => request()->query('search')])->links() }}
    </div>
@endsection('content)
