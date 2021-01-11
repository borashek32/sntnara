<x-app-layout>
    <x-slot name="header">
        @if(Auth::user()->hasRole('super-admin'))
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Панель администратора') }}
        </h2>
        @else()
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Панель пользователя') }}
        </h2>
        @endif
    </x-slot>

</x-app-layout>
