@extends('layouts.site')
@section('title-block')СНТ НАРА@endsection('title-block')
@section('content')
            <ul>
                @foreach($comment->replies as $reply)
                    <li class="list-group-item w-40" style="margin-left:40px;">
                        {{ $reply->user->name }}
                        <p style="font-size:12px">
                            {{ Date::parse($reply->created_at)->format('j F Y') }}
                        </p>
                    </li>
                    <li class="list-group-item w-40" style="margin-left:40px;">{{ $reply->body }}</li>
                @endforeach
            </ul>
@endsection('content)
