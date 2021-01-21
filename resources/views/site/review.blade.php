@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <div class="card mb-4 bg-primary" style="margin-top:10px">
        <ul class="list-group list-group-flush">
            <li class="list-group-item w-40">
                <p style="font-weight:600; font-size:14px">{{ $review->user->name }}</p>
                <div class="row">
                    <div class="col-2">
                        <img src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->name }}" class="rounded float-start" width="100px">
                        <p style="font-size:10px">Зарегистрирован:<br>{{ Date::parse($review->user->created_at)->format('j F Y') }}</p>
                    </div>
                    <div class="col-10">
                        <p style="margin-bottom:10px;font-size:12px">{{ Date::parse($review->created_at)->format('j F Y') }}</p>
                        <p>
                            {{ $review->body }}
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="card mb-4" style="padding:20px">
        <form method="POST" action="{{ route('opinion', $review->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="review_id" value="{{ $review->id }}">
            <input type="hidden" name="review_author_email" value="{{ $review->user->email }}">
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
            @else
                <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы оставить комментарий</p>
                <div class="row">
                    <div class="col-12">
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
    @foreach($review->opinions as $opinion)
        <div class="card mb-4 bg-primary" style="margin-top:10px">
            <ul class="list-group list-group-flush">
                <li class="list-group-item w-40">
                    <p style="font-weight:600; font-size:14px">{{ $opinion->user->name }}</p>
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ $opinion->user->profile_photo_url }}" alt="{{ $opinion->user->name }}" class="rounded float-start" width="100px">
                            <p style="font-size:10px">Зарегистрирован:<br>{{ Date::parse($opinion->user->created_at)->format('j F Y') }}</p>
                        </div>
                        <div class="col-10">
                            <p style="margin-bottom:10px;font-size:12px">{{ Date::parse($opinion->created_at)->format('j F Y') }}</p>
                            <p>{{ $opinion->body }}</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    @endforeach
@endsection('content)
