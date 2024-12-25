<x-app-layout>
    <section class="w-full grid grid-cols-3 gap-4 p-4">
        <article class="group  bg-neutral text-primary-content p-4 rounded-lg shadow-md">

            {{-- LISTADO DE TAREAS PENDIENTES --}}
            <h2 class="text-purple-100 font-bold mb-4">Por hacer ({{ $tasks->where('status', 'pending')->count() }}) 🙂</h2>


            <ul class="space-y-4">

                @foreach ($tasks as $task)
                @if ($task->status == 'pending')
                    @php
                        $bgClass = match ($task->priority) {
                            'low' => 'bg-violet-300',
                            'medium' => 'bg-teal-200',
                            'high' => 'bg-indigo-300',
                            default => 'bg-default', // Opcional
                        };
                        $badgeClass = match ($task->priority) {
                            'low' => 'badge-info',
                            'medium' => 'badge-warning',
                            'high' => 'badge-error',
                            default => 'bg-default', // Opcional
                        };
                    @endphp
                    <li>
                        <div class="card {{ $bgClass }} shadow-lg p-4">
                            <div class="flex justify-between items-center">
                                <h3 class="card-title font-semibold">{{ $task->title }}</h3>
                                <div class="dropdown dropdown-end">
                                    <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                    <ul tabindex="0"
                                        class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow text-zinc-100">
                                        <li><a>Editar</a></li>
                                        <li><a>En Curso</a></li>
                                        <li><a>Terminado</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p>{{ $task->description }}</p>
            
                            <footer>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-2">
                                        <div class="badge {{$badgeClass}}">#{{$task->priority}}</div>
                                        <div class="badge badge-neutral">#Tarea</div>
                                        <div class="badge badge-secondary">#Importante</div>
                                
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </li>
                        <!-- Otra tarjeta -->
                        {{-- <li>
                        <div class="card bg-green-200 shadow-lg p-4">
                            <div class="flex justify-between items-center">
                                <h3 class="card-title font-semibold">Leer: Minimalismo digital</h3>
                                <div class="dropdown dropdown-end">
                                    <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                    <ul tabindex="0"
                                        class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                        <li><a>Editar</a></li>
                                        <li><a>En Curso</a></li>
                                        <li><a>Terminado</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p>This is another example of a card description.</p>
                        </div>
                    </li> --}}
                    @endif
                @endforeach

            </ul>
        </article>

        <!-- Otros grupos similares -->
        <article class="group bg-neutral text-primary-content p-4 rounded-lg shadow-md">
            <h2 class="text-purple-100 font-bold mb-4">En curso (5) 😥</h2>
            <ul class="space-y-4">
                <li>
                    <div class="card bg-purple-200 shadow-lg p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="card-title font-semibold">Estudiar JS</h3>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                <ul tabindex="0"
                                    class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                    <li><a>Editar</a></li>
                                    <li><a>En Curso</a></li>
                                    <li><a>Terminado</a></li>
                                </ul>
                            </div>
                        </div>
                        <p>This is another example of a card description.</p>
                    </div>
                </li>
                <li>
                    <div class="card bg-yellow-200 shadow-lg p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="card-title font-semibold">Estudiar JS</h3>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                <ul tabindex="0"
                                    class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                    <li><a>Editar</a></li>
                                    <li><a>En Curso</a></li>
                                    <li><a>Terminado</a></li>
                                </ul>
                            </div>
                        </div>
                        <p>This is another example of a card description.</p>
                    </div>
                </li>
                <li>
                    <div class="card bg-purple-300 shadow-lg p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="card-title font-semibold">Estudiar JS</h3>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                <ul tabindex="0"
                                    class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                    <li><a>Editar</a></li>
                                    <li><a>En Curso</a></li>
                                    <li><a>Terminado</a></li>
                                </ul>
                            </div>
                        </div>
                        <p>This is another example of a card description.</p>
                    </div>
                </li>
                <li>
                    <div class="card bg-indigo-200 shadow-lg p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="card-title font-semibold">Estudiar JS</h3>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                <ul tabindex="0"
                                    class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                    <li><a>Editar</a></li>
                                    <li><a>En Curso</a></li>
                                    <li><a>Terminado</a></li>
                                </ul>
                            </div>
                        </div>
                        <p>This is another example of a card description.</p>
                    </div>
                </li>
            </ul>
        </article>

        <article class="group bg-neutral-content text-primary-content p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-bold mb-4">En curso (5) 😥</h2>
            <ul class="space-y-4">
                <li>
                    <div class="card bg-yellow-200 shadow-lg p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="card-title font-semibold">Estudiar JS</h3>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                <ul tabindex="0"
                                    class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                    <li><a>Editar</a></li>
                                    <li><a>En Curso</a></li>
                                    <li><a>Terminado</a></li>
                                </ul>
                            </div>
                        </div>
                        <p>This is another example of a card description.</p>
                    </div>
                </li>

                <li>
                    <div class="card bg-green-200 shadow-lg p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="card-title font-semibold">Estudiar JS</h3>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                <ul tabindex="0"
                                    class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                    <li><a>Editar</a></li>
                                    <li><a>En Curso</a></li>
                                    <li><a>Terminado</a></li>
                                </ul>
                            </div>
                        </div>
                        <p>This is another example of a card description.</p>
                    </div>
                </li>

                <li>
                    <div class="card bg-red-200 shadow-lg p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="card-title font-semibold">Estudiar JS</h3>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="btn btn-sm m-1">Opciones</div>
                                <ul tabindex="0"
                                    class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                    <li><a>Editar</a></li>
                                    <li><a>En Curso</a></li>
                                    <li><a>Terminado</a></li>
                                </ul>
                            </div>
                        </div>
                        <p>This is another example of a card description.</p>
                    </div>
                </li>
            </ul>
    </section>
    </article>


</x-app-layout>
