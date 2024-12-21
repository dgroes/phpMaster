<x-app-layout class="flex justify-center items-center h-screen bg-gray-100">
    <article class="group bg-neutral text-primary-content p-8 rounded-lg shadow-md w-full max-w-2xl">
        <form action="{{ route('tasks.store') }}" method="POST">
          @csrf
            {{-- Titulo --}}
            <label class="form-control w-full mb-4">
                <div class="label">
                    <span class="label-text text-lg">Titulo de tarea</span>
                    <span class="badge badge-primary">Obligatorio</span>
                </div>
                <input type="text" name="title" placeholder="Type here" class="input input-bordered w-full text-lg p-4" />
            </label>

            {{-- Descripción --}}
            <label class="form-control w-full mb-4">
                <div class="label">
                    <span class="label-text text-lg">Descripción</span>
                    <span class="badge badge-primary">Obligatorio</span>
                </div>
                <textarea name="description" class="textarea textarea-bordered h-32 text-lg p-4" placeholder="Descripción"></textarea>
            </label>

            {{-- Prioridad --}}
            <label class="form-control w-full mb-4">
                <div class="label">
                    <span class="label-text text-lg">Nivel de prioridad</span>
                    <span class="badge badge-primary">Obligatorio</span>
                </div>
                <select name="priority" class="select select-bordered text-lg p-4 w-full">
                    <option disabled selected>Selecciona un nivel</option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baja">Baja</option>
                </select>
            </label>

            {{-- Tags --}}
            <label class="form-control w-full mb-4">
                <div class="label">
                    <span class="label-text text-lg">Tags
                        <div class="tooltip" data-tip="No es necesario añadir un '#' al principio de cada tag.">
                            <div class="badge badge-secondary">Info</div>
                        </div>
                    </span>
                    <span class="badge badge-accent">Opcional</span>
                </div>
                <input type="text" name="tags" placeholder="Escribe tags separados por espacio..." class="input input-bordered w-full text-lg p-4" />
            </label>

            <button type="submit" class="btn btn-primary w-full text-lg p-4">Crear tarea</button>
        </form>
    </article>
</x-app-layout>
