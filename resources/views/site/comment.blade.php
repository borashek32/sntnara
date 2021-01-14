@extends('layouts.site')
@section('title-block')СНТ НАРА@endsection('title-block')
@section('content')
        <div class="card mb-4 bg-primary" style="margin-top:10px">
            <ul class="list-group list-group-flush">
                <li class="list-group-item w-40">
                    {{ $comment->user->name }}
                    <p style="font-size:12px">
                        {{ Date::parse($comment->created_at)->format('j F Y') }}
                    </p>
                </li>
                <li class="list-group-item w-40">{{ $comment->body }}</li>

                <li class="list-group-item w-40"><a href="{{ route('replies', $comment->id) }}">Отвеиы на комментарий</a></li>

{{--                <li class="list-group-item w-40">--}}
{{--                    <form method="POST" action="{{ route('reply', $comment->id) }}">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">--}}
{{--                        <input type="hidden" name="post_id" value="{{ $comment->post_id }}">--}}
{{--                        @if(auth()->user())--}}
{{--                            <h6 style="margin-left:20px;margin-top:20px">{{ Auth::user()->name }}</h6>--}}
{{--                        @endif--}}
{{--                        <textarea name="body" rows="2" id="body" class="form-control" style="margin-left:20px;"--}}
{{--                                  placeholder="Ответьте на комментарий" required minlength="5"></textarea>--}}
{{--                        <input type="submit" value="Ответить" class="btn btn-md btn-success"--}}
{{--                               style="width:100px;height:35px;margin-bottom:10px;margin-top:5px;margin-left:20px;">--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--                @foreach($comment->replies as $reply)--}}
{{--                    <li class="list-group-item w-40" style="margin-left:40px;">--}}
{{--                        {{ $reply->user->name }}--}}
{{--                        <p style="font-size:12px">--}}
{{--                            {{ Date::parse($reply->created_at)->format('j F Y') }}--}}
{{--                        </p>--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item w-40" style="margin-left:40px;">{{ $reply->body }}</li>--}}
{{--                @endforeach--}}
            </ul>
        </div>
@endsection('content)
