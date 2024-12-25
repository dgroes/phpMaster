<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="navbar bg-neutral text-neutral-content">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <h1>Mis tareas:</h1>
    {{-- @if ($tasks->count())
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task->title }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay tareas disponibles.</p>
    @endif --}}
    <section class="w-full grid grid-cols-3 gap-4 p-4">
        <!-- Grupo de tareas: Por hacer -->
        
    </section>



</x-app-layout>
