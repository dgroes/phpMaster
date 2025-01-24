<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel para SPA') }}
        </h2>
    </x-slot>

    @persist('player-key')
        <audio src="{{ asset('audios/Cavernous.m4a') }}" controls></audio>
    @endpersist
</x-app-layout>
