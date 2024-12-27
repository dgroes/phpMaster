<x-app-layout>
    <section class="w-full grid grid-cols-3 gap-4 p-4">
        {{-- LISTADO DE TAREAS PENDIENTES --}}
        <article class="group bg-neutral text-primary-content p-4 rounded-lg shadow-md">

            <h2 class="text-purple-100 font-bold mb-4">Por hacer ({{ $tasks->where('status', 'pending')->count() }}) 🙂</h2>
            <ul class="space-y-4">
                @foreach ($tasks as $task)
                    @if ($task->status === 'pending')
                        <x-task-card :task="$task" />
                    @endif
                @endforeach
            </ul>

        </article>


        {{-- Sección "Tareas en curso" --}}
        <article class="group bg-neutral text-primary-content p-4 rounded-lg shadow-md">

            <h2 class="text-purple-100 font-bold mb-4">En curso ({{ $tasks->where('status', 'in_progress')->count() }})😥</h2>
            <ul class="space-y-4">
                @foreach ($tasks as $task)
                    @if ($task->status === 'in_progress')
                        <x-task-card :task="$task" />
                    @endif
                @endforeach
            </ul>

        </article>


        {{-- Sección "Tareas completadas" --}}
        <article class="group bg-neutral text-primary-content p-4 rounded-lg shadow-md">

            <h2 class="text-purple-100 font-bold mb-4">Completadas({{ $tasks->where('status', 'completed')->count() }}) 😎</h2>
            <ul class="space-y-4">
                @foreach ($tasks as $task)
                    @if ($task->status === 'completed')
                        <x-task-card :task="$task" />
                    @endif
                @endforeach
            </ul>
        
        </article>
    
    </section>


</x-app-layout>
