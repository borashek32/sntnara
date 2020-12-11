@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <h2>Отзывы и предложения</h2>
    <form action="{{ route('reviews-form') }}" method="post" id="myForm" data-ajax-form>
        @csrf
        <div class="form-group">
            <label class="p-1" for="name">Имя:</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autocomplete="name" minlength="2" autofocus>
        </div>
        <div class="form-group">
            <label class="p-1" for="review">Отзыв или предложение:</label>
            <textarea id="review" rows="7" type="review" class="form-control @error('review') is-invalid @enderror"
                      name="review" value="{{ old('review') }}" required autocomplete="review"></textarea>
        </div>
        <p><button type="submit" class="btn btn-md btn-success">Отправить</button></p>
    </form>
    <script>
        $('#myForm').validate();
    </script>
    @foreach($reviews as $review)
        <div class="card mb-4 bg-primary">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $review->name }}</li>
                <li class="list-group-item">{{ Date::parse($review->created_at)->format('j F Y') }}</li>
                <li class="list-group-item">{{ $review->review }}</li>
            </ul>
        </div>
    @endforeach
@endsection('content)
