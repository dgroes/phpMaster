@php
    $classes = $getPriorityClasses();
    $bgClass = $classes['bgClass'];
    $badgeClass = $classes['badgeClass'];

    /*  Referencia: views/readme.md#comentario-03 */
    $task->tags = array_filter($task->tags ?? []);
@endphp

<li>
    <div class="card {{ $bgClass }} shadow-lg p-4">
        <div class="flex justify-between items-center">
            <h3 class="card-title font-semibold">{{ $task->title }}</h3>
            <div class="dropdown dropdown-end">
                <button tabindex="0" role="button" class="btn btn-sm m-1">Opciones</button>
                <ul tabindex="0"
                    class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow text-zinc-100">
                    <li><a href="{{ route('tasks.edit', $task) }}">Editar</a></li>

                    @unless ($task->status === 'pending')
                        <li class="cursor-pointer" onclick="this.querySelector('form').submit()">
                            <form action="{{ route('tasks.updateStatus', ['task' => $task->id]) }}" method="POST"
                                class="w-full">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <input type="hidden" name="status" value="pending">
                                <span>Por hacer</span>
                            </form>
                        </li>
                    @endunless

                    @unless ($task->status === 'in_progress')
                        <li class="cursor-pointer" onclick="this.querySelector('form').submit()">
                            <form action="{{ route('tasks.updateStatus', ['task' => $task->id]) }}" method="POST"
                                class="w-full">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <input type="hidden" name="status" value="in_progress">
                                <span>En curso</span>
                            </form>
                        </li>
                    @endunless

                    @unless ($task->status === 'completed')
                        <li class="cursor-pointer" onclick="this.querySelector('form').submit()">
                            <form action="{{ route('tasks.updateStatus', ['task' => $task->id]) }}" method="POST"
                                class="w-full">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <input type="hidden" name="status" value="completed">
                                <span>Terminado</span>
                            </form>
                        </li>
                    @endunless

                    <li>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-left text-red-600">Eliminar</button>
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
                    {{-- Referencia: views/readme.md#comentario-03 --}}
                    @if (!empty($task->tags))
                        @foreach ($task->tags as $tag)
                            <div class="badge badge-info">#{{ $tag }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </footer>


    </div>
</li>
