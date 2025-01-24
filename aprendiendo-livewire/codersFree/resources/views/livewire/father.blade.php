<div>

    @persist('player-key')
        <audio src="{{ asset('audios/Cavernous.m4a') }}" controls></audio>
    @endpersist


    <x-button wire:click="redirigir">
        Ir a prueba
    </x-button>

    <h1 class="text-2xl font-semibold">Soy el componente padre 🧑</h1>

    <hr class="my-6">

    <x-input wire:model.live="name">

    </x-input>

    <div>
        {{--  @livewire('son', [
            'name' => $name
        ]) --}}
        {{-- <livewire:son wire:model="name" /> --}}

        @livewire('contador', [], key('contador1'))
        @livewire('contador', [], key('contador2'))
        @livewire('contador', [], key('contador3'))
        @livewire('contador', [], key('contador4'))
    </div>

    {{-- {{$prueba}} --}}
</div>
