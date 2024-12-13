<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar tarea: ') }} {{$task->title}}
        </h2>
        
    </x-slot>

    <x-form-task :method="'PUT'" :action="route('tasks.update', $task->id)" :task="$task" :buttonText="'Actualizar'" />

</x-app-layout>
