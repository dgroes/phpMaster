<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="navbar bg-neutral text-neutral-content">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <section class="w-full grid grid-cols-3 gap-4 p-4">
        <!-- Grupo de tareas: Por hacer -->
        <article class="group  bg-neutral-content text-primary-content p-4 rounded-lg shadow-md">

            <h2 class="text-lg font-bold mb-4">Por hacer (12) 🙂</h2>

            <ul class="space-y-4">
                <!-- Tarjeta interna -->
                <li>
                    <div class="card bg-primary shadow-lg p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="card-title font-semibold">Editar algo</h3>
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
                        <p>If a dog chews shoes whose shoes does he choose?</p>

                        <footer>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-2">
                                    <div class="badge badge-secondary">#Tarea</div>
                                    <div class="badge badge-secondary">#Importante</div>
                                </div>
                        </footer>
                    </div>
                </li>
                <!-- Otra tarjeta -->
                <li>
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
                </li>
            </ul>
        </article>

        <!-- Otros grupos similares -->
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
            </ul>
        </article>
    </section>



</x-app-layout>
