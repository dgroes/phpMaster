<x-app-layout class="flex justify-center items-center h-screen bg-gray-100">
    <article class="group bg-neutral text-primary-content p-8 rounded-lg shadow-md w-full max-w-2xl">
        <form action="{{ route('tasks.update', $task) }}" method="POST">

            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold text-white ">{{ $task->title }}</h1>
                </div>
            </div>
            @csrf
            @method('PUT')
            {{-- Titulo --}}
            <label class="form-control w-full mb-4">
                <div class="label">
                    <span class="label-text text-lg">Titulo de tarea</span>
                    <span class="badge badge-primary">Obligatorio</span>
                </div>
                <!-- Referencia: views/readme.md#comentario-01 -->
                <input type="text" name="title" placeholder="Type here"  value="{{ old('title') !== null ? old('title') : $task->title }}" 
                    class="input input-bordered w-full text-white p-4" />
                @error('title')
                    <span class="badge badge-error mt-2">{{ $message }}</span>
                @enderror
            </label>

            {{-- Descripción --}}
            <label class="form-control w-full mb-4">
                <div class="label">
                    <span class="label-text text-lg">Descripción</span>
                    <span class="badge badge-primary">Obligatorio</span>
                </div>
                <textarea name="description" class="textarea textarea-bordered h-32 text-white p-4" placeholder="Descripción">{{ old('description') !== null ? old('description') : $task->description }}" </textarea>
                @error('description')
                    <span class="badge badge-error mt-2">{{ $message }}</span>
                @enderror
            </label>

            {{-- Prioridad --}}
            <label class="form-control w-full mb-4">
                <div class="label">
                    <span class="label-text text-lg">Nivel de prioridad</span>
                    <span class="badge badge-primary">Obligatorio</span>
                </div>
                <select name="priority" class="select select-bordered text-white p-4 w-full">

                    <option disabled selected>Selecciona un nivel</option>
                    <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>Alta
                    </option>
                    <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Media
                    </option>
                    <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Baja
                    </option>

                </select>
                {{-- @error('description')
                    <span class="badge badge-error mt-2">{{ $message }}</span>
                @enderror --}}
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
                <!-- Referencia: views/readme.md#comentario-02 -->
                <input type="text" name="tags[]" placeholder="Escribe tags separados por espacio..."
                   value="{{ old('tags') ? implode(' ', old('tags')) : (isset($task->tags) ? implode(' ', $task->tags) : '') }}"
                    class="input input-bordered w-full text-white p-4" />

            </label>

            <button type="submit" class="btn btn-primary w-full text-lg p-4">Editar tarea</button>
        </form>
    </article>
</x-app-layout>
