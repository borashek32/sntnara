<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Напишите ваш отзыв или предложение</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('contact-form') }}" method="post" id="myForm" data-ajax-form>
                @csrf
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
                    <textarea name="message" rows="7" id="message" class="form-control" placeholder="Введите ваше сообщение"
                              required minlength="10"></textarea>
                </div>
                <p>
                    <button type="submit" class="btn btn-md btn-success">
                        Отправить
                    </button>
                </p>
            </form>
        </div>
    </div>
</div>
