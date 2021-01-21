@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <h2>Отзывы и предложения</h2>
    <div class="card mb-4" style="padding:20px">
        <form action="{{ route('reviews-form') }}" method="post" id="myForm" data-ajax-form>
            {{ csrf_field() }}
            @if(auth()->user())
                <p style="font-weight:600;font-size:14px">{{ Auth::user()->name }}</p>
                <div class="row">
                    <div class="col-2">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded float-start" width="100px">
                        <p style="font-size:10px">Зарегистрирован:<br>{{ Auth::user()->created_at->format('j F Y') }}</p>
                    </div>
                    <div class="col-10">
                        <textarea id="review" placeholder="Введите ваш отзыв или предложение" rows="7" type="review" class="form-control @error('review') is-invalid @enderror"
                                  name="review" value="{{ old('review') }}" required autocomplete="review"></textarea>
                        <div class="row">
                            <div class="g-recaptcha" style="margin-left:20px;margin-top:20px;margin-bottom:20px" data-sitekey="6LdN-AgaAAAAAMAh8IPeiGknzhzY5MXnNabRtMTI"></div>
                            <input type="submit" value="Отправить" class="btn btn-md btn-success" style="width:120px;height:40px;margin-top:40px;margin-left:20px">
                        </div>
                    </div>
                </div>
            @else
                <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы оставить отзыв или предложение</p>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @foreach($reviews as $review)
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
                <li class="list-group-item"><a href="{{ route('opinion', $review->id) }}">Комментарии</a></li>
            </ul>
        </div>
    @endforeach
@endsection('content)
