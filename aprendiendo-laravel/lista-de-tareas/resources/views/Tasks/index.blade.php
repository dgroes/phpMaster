<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tareas') }}
        </h2>
    </x-slot>
    @extends('layouts.app')

    @foreach ($tasks as $task)
        <li>
            <a href="{{ route('tasks.show', $task) }}">
                {{ $tasks->title }}
            </a>
        </li>
    @endforeach

</x-app-layout>
