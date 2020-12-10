<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/img/sntnara_logo.jpg" width="100" alt="СНТ НАРА">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Спасибо за регистрацию! Прежде чем начать, не могли бы вы подтвердить свой адрес
                электронной почты, нажав на ссылку, которую мы только что отправили вам? Если вы не
                получили письмо, мы с радостью отправим вам другое.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('На адрес электронной почты, который вы указали при регистрации,
                    была отправлена новая ссылка для подтверждения.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Выслать повторно письмо для подтверждения') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Выйти') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
