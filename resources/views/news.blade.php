@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <h2>Новости</h2>
    @foreach($posts as $post)
        <div class="card mb-4 bg-primary">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ date_format($post->created_at,'j F Y') }}</li>
                <li class="list-group-item">{{ $post->title }}</li>
                <li class="list-group-item">{{ $post->body }}</li>
            </ul>
        </div>
    @endforeach
    {{ $posts->links() }}
@endsection('content)
