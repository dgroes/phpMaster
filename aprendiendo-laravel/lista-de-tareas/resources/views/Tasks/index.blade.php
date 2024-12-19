<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tareas') }}
        </h2>
    </x-slot>

    
    {{-- TABLA DE TAREAS POR HACER (PENDIENTES) --}}
    <div class="relative overflow-x-auto p-24 shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                Tareas por Realizar
                <tr>
                    <th scope="col" class="px-6 py-3">Tarea</th>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <button class="task__toggle-status" data-id="<?= $task->id ?>" data-status="<?= $task->status ?>">Marcar como <?= $task->status == 'pendiente' ? 'completada' : 'pendiente' ?></button>

                    @if ($task->completed == 0)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $task->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $task->description ?? 'Sin descripción' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $task->completed ? 'Completada' : 'Pendiente' }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('tasks.update', $task) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="markAsComplete">
                                    <button type="submit" class="font-medium text-blue-600 hover:underline">
                                        Cumplida
                                    </button>
                                </form>
                                
                                |
                                <a href="{{ route('tasks.edit', $task) }}"
                                    class="font-medium text-green-600 hover:underline">Editar</a>
                                |
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- TABLA DE TAREAS REALIZADAS (CUMPLIDAS) --}}
    <div class="relative overflow-x-auto p-24 shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                Tareas por Cumplidas
                <tr>
                    <th scope="col" class="px-6 py-3">Tarea</th>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    @if ($task->completed == 1)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $task->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $task->description ?? 'Sin descripción' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $task->completed ? 'Completada' : 'Pendiente' }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('tasks.update', $task) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="markAsPending">
                                    <button type="submit" class="font-medium text-blue-600 hover:underline">
                                        Pendiente
                                    </button>
                                </form>
                                |
                                <a href="{{ route('tasks.edit', $task) }}"
                                    class="font-medium text-green-600 hover:underline">Editar</a>
                                |
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>



</x-app-layout>
