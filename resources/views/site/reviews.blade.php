@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <h2>Отзывы и предложения</h2>
    <p>*Оставить отзыв или предложение могут только зарегистрированные пользователи</p>
    <div class="card mb-4" style="padding:20px">
        <form action="{{ route('reviews-form') }}" method="post" id="myForm" data-ajax-form>
            @csrf
            @if(auth()->user())
                <h4>{{ Auth::user()->name }}</h4>
            @endif
            <div class="form-group">
                <textarea id="review" placeholder="Введите ваш отзыв или предложение" rows="7" type="review" class="form-control @error('review') is-invalid @enderror"
                          name="review" value="{{ old('review') }}" required autocomplete="review"></textarea>
            </div>
            <div class="row">
                <div class="g-recaptcha" style="margin-left:20px;margin-top:20px;margin-bottom:20px" data-sitekey="6LdN-AgaAAAAAMAh8IPeiGknzhzY5MXnNabRtMTI"></div>
                <input type="submit" value="Отправить" class="btn btn-md btn-success" style="width:120px;height:40px;margin-top:40px;margin-left:20px">
            </div>
        </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @foreach($reviews as $review)
        <div class="card mb-4 bg-primary">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $review->user->name }}</li>
                <li class="list-group-item">{{ Date::parse($review->created_at)->format('j F Y') }}</li>
                <li class="list-group-item">{{ $review->review }}</li>
            </ul>
        </div>
    @endforeach
@endsection('content)
