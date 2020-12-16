@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <h2>Новости</h2>
    @foreach($posts as $post)
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
    <div class="text-center">
        {{ $posts->links() }}
    </div>
@endsection('content)
