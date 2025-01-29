<div>

    @livewire('hijo')

    <x-button class="mb-4" wire:click="$set('count', 0)">
        Resetear
    </x-button>

    <x-button class="mb-4" wire:click="$toggle('open')">
        Mostrar / Ocultar
    </x-button>

    <form method="" action="" wire:submit="save" class="mb-4">
        @csrf
        <x-input
            wire:model='pais'
            placeholder="Ingrese un país"
            wire:keydown.space="increment"/>
        <x-button>
            Agregar
        </x-button>
    </form>

    @if ($open )
    <ul class="list-disc list-inside space-y-2">
        @foreach ($paises as $index => $pais)

            <li wire:key="pais-{{$index}}">
                {{-- ({{ $index }}) {{ $pais }} --}}
                <span wire:mouseenter="changeActive('{{$pais}}')">
                    ({{ $index }}) {{ $pais }}
                </span>
                <x-danger-button wire:click="delete({{ $index }})">
                    X
                </x-danger-button>
            </li>

        @endforeach
    </ul>

    {{-- {{$active}} --}}
    {{$count}}
    @endif

</div>
