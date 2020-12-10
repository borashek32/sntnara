<div class="d-flex flex-column flex-md-row align-items-center
    p-2 px-md-4 mb-3 border-bottom shadow-sm navbar sticky-top navbar-light bg-light">
    <h5 class="my-0 text-dark mr-md-auto font-weight-normal z-40 ml-0 mt-0 bg-gray-400"><a href="/">СНТ НАРА</a></h5>
    <nav class="my-2 my-md-0 mr-md-3" id="nav">
        <a class="p-2 text-dark" href="/">Наши новости</a>
        <a class="p-2 text-dark" href="{{ route('docs') }}">Документы</a>
        <a class="p-2 text-dark" href="{{ route('reviews') }}">Отзывы и предложения</a>
        <a class="p-2 text-dark" href="{{ route('map') }}">Как проехать</a>
        <a class="p-2 text-dark" href="{{ route('contacts') }}">Контакты</a>
    </nav>
{{--    @if (Route::has('login'))--}}
{{--        <div class="hidden fixed top-0 right-0 px-6 py-2 sm:block">--}}
{{--            @auth--}}
{{--                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Личный кабинет</a>--}}
{{--            @else--}}
{{--                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Вход</a>--}}

{{--                @if (Route::has('register'))--}}
{{--                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Регистрация</a>--}}
{{--                @endif--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    @endif--}}
</div>
