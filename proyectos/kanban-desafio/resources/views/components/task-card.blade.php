@php
    $classes = $getPriorityClasses();
    $bgClass = $classes['bgClass'];
    $badgeClass = $classes['badgeClass'];
@endphp

<li>
    <div class="card {{ $bgClass }} shadow-lg p-4">
        <div class="flex justify-between items-center">
            <h3 class="card-title font-semibold">{{ $task->title }}</h3>
            <div class="dropdown dropdown-end">
                <button tabindex="0" role="button" class="btn btn-sm m-1">Opciones</button>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow text-zinc-100">
                    <li><a href="#">Editar</a></li>
                    <li>
                        <form action="{{ route('tasks.updateStatus', ['task' => $task->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="hidden" name="status" value="pending">
                            <button type="submit" class="btn btn-link">Por hacer</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('tasks.updateStatus', ['task' => $task->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="hidden" name="status" value="in_progress">
                            <button type="submit" class="btn btn-link">En curso</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('tasks.updateStatus', ['task' => $task->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="btn btn-link">Terminar</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-red-600">Eliminar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <p>{{ $task->description }}</p>
        <footer>
            <div class="flex justify-between items-center">
                <div class="flex flex-wrap gap-2">
                    <div class="badge {{ $badgeClass }}">#{{ $task->priority }}</div>
                    @if (!empty($task->tags) && is_array($task->tags))
                        @foreach ($task->tags as $tag)
                            <div class="badge badge-info">#{{ $tag }}</div>
                        @endforeach
                    @else
                        <p class="text-sm text-gray-500">No hay tags.</p>
                    @endif
                </div>
            </div>
        </footer>
        
        
    </div>
</li>
