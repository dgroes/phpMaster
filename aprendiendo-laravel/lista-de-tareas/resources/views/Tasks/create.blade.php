<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear nueva Tarea 🐷') }}
        </h2>
    </x-slot>



    {{-- {{dd(auth()->id());}} --}}

    {{-- 
    <form class="max-w-xl mx-auto p-10" method="POST" action="{{ route('tasks.store')}}">
        @csrf
        <div class="mb-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Titulo</label>
            <input type="text" id="base-input" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
        </div>
        <div class="mb-5">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Descripción</label>
            <input type="text" id="large-input" name="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
        </div>

        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
            Crear Tarea
        </button>
        
    </form> --}}
    <x-form-task :method="'POST'" :action="route('tasks.store')" :buttonText="'Crear'" />






</x-app-layout>
