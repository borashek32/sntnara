<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
    @include('includes.header')
    <div class="container">
        <div class="container">
            <div class="site-index">
                <div class="jumbotron promo">
                    <div class="phone">
                        <a href="tel:+79169174630" class="textAddress">8(916)917-46-30</a>
                    </div>
                    <p class="lead">249023, Калужская область,<br>
                        Жуковский район, д. Чубарово</p>
                    <h1 class="spacePromo">СНТ НАРА</h1>
                    <h2 class="lead">Вместе сделаем наше товарищество лучше!</h2>
                    <div class="spacePromo">
                        <p>
                            <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#exampleModal">
                                Напишите нам
                            </button>
                        </p>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        @include('includes.contact_button')
                    </div>
                    @include('includes.messages_success')
                </div>
                <div class="body-content">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-12 col-12">
                            @include('includes.menu-left')
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                            @include('includes.search')
                            @yield('content')
                        </div>
{{--                        <div class="col-lg-2 col-md-3" id="adv">--}}
{{--                            @include('includes.advertisements')--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
    <div id='app'></div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
