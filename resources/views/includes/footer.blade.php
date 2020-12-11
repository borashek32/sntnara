<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-12 col-md">
            <img src="/img/digitalCoffeeSm.jpg" alt="Digital coffee design">
            <p class="d-block mb-3 text-muted text-small"><a href="http://digitalcoffeedesign.com">&copy; Digital<br>coffee design</a><br>
                <?= date('Y') ?></p>
        </div>
        <div class="col-6 col-md">
            <h6>СНТ НАРА</h6>
            <ul class="list-unstyled text">
                <li><a class="text-muted" href="/">Наши новости</a></li>
                <li><a class="text-muted" href="{{ route('docs') }}">Документы</a></li>
                <li><a class="text-muted" href="{{ route('reviews') }}">Отзывы и предложения</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h6>Обратная связь</h6>
            <ul class="list-unstyled text">
                <ul class="list-unstyled text">
                    <li><a class="text-muted" href="{{ route('contacts') }}">Напишите нам</a></li>
                    <li><a class="text-muted" href="tel:+79169174630">8(916)917-46-30</a></li>
                </ul>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h6>О нас</h6>
            <ul class="list-unstyled text">
                <li><a class="text-muted" href="{{ route('contacts') }}">Контакты</a></li>
            </ul>
        </div>
    </div>
</footer>
