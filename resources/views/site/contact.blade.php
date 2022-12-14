@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <p class="text"><p class="lead">249023, Калужская область,<br>
        Жуковский район, д. Чубарово</p> <a href="tel:+79267013882" class="textAddress">8(916)917-46-30</a></p>
    <h3>Напишите нам</h3>
    <form action="{{ route('contact-form') }}" method="post" id="myForm" data-ajax-form>
        @csrf
        @include('includes.messages_success')
        <div class="form-group">
            <label class="p-1" for="name">Имя:</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autocomplete="name" minlength="2" autofocus>
        </div>
        <div class="form-group">
            <label class="p-1" for="email">Email:</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
        <div class="form-group">
            <label class="p-1" for="subject">Тема:</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="subject" value="{{ old('subject') }}" minlength="5" required autocomplete="subject">
        </div>
        <div class="form-group">
            <label class="p-1" for="message">Сообщение:</label>
            <textarea name="message" rows="7" id="message" class="form-control"
                      placeholder="Введите ваше сообщение" required minlength="10"></textarea>
        </div>
        <div class="row">
            <div class="g-recaptcha" style="margin-left:20px;margin-top:20px;margin-bottom:20px" data-sitekey="6LdN-AgaAAAAAMAh8IPeiGknzhzY5MXnNabRtMTI"></div>
            <input type="submit" value="Отправить" class="btn btn-md btn-success" style="width:120px;height:40px;margin-top:40px;margin-left:20px">
        </div>
        </form>
    </form>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection('content')
