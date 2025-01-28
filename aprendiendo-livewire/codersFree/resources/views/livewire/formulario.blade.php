<div>

    {{-- Formulario de creación de un Post --}}
    <div class="bg-white shadow rounded-lg p-6">

        @if ($postCreate->image)
            <img src="{{ $postCreate->image->temporaryUrl() }}" alt="">
        @endif

        <h2 class="text-lg font-semibold mb-4">Crear un nuevo Post</h2>
        <form wire:submit="save">
            {{-- Nombre --}}
            <div class="mb-4">
                <x-label>Nombre</x-label>
                <x-input class="w-full" wire:model.live='postCreate.title' />

                <x-input-error for='postCreate.title' />

            </div>

            {{-- Contenido --}}
            <div class="mb-4">
                <x-label>Contenido</x-label>
                <x-textarea class="w-full" wire:model.live='postCreate.content'></x-textarea>
                <x-input-error for='postCreate.content' />

            </div>

            {{-- Categoría --}}
            <div class="mb-4">
                <x-label>Categoría</x-label>

                <x-select class="w-full" wire:model.live='postCreate.category_id'>
                    <option value="" disabled>
                        Selecciona una categoría
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    content
                </x-select>
                <x-input-error for='postCreate.category_id' />
            </div>

            {{-- Imagen --}}
            <div class="mb-4">
                <x-label>Imagen</x-label>

                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <input type="file" wire:model="postCreate.image" />

                    <!-- Progress Bar -->
                    <div x-show="uploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
            </div>

            {{-- Etiquetas --}}
            <div class="mb-4">
                <x-label>Etiquetas</x-label>

                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox type="checkbox" wire:model="postCreate.tags" value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
                <x-input-error for='postCreate.tags' />
            </div>

            {{-- Enviar --}}
            <div class="flex justify-end">
                {{--   <x-button wire:loading.class="opacity-50" wire:target="save">
                    Crear
                </x-button> --}}
                <x-button wire:loading.attr="disabled">
                    Crear
                </x-button>
            </div>

            {{--  <div wire:loading.delay>
                <div>Hola mundo</div>
            </div>
            --}}

        </form>

        <div wire:loading wire:target="save">
            Procesando...
        </div>
    </div>

    {{-- Listado de los Posts --}}
    <div class="bg-white shadow rounded-lg p-6 mt-6">
        <h2 class="text-lg font-semibold mb-4">Listado de Posts</h2>

        <div class="mb-4">
            <x-input class="w-full" placeholder="Buscar" wire:model.live="search"/>
        </div>

        <ul class="list-disc list-inside space-y-6">
            @foreach ($posts as $post)
                <li class="flex justify-between" wire:key="post-{{ $post->id }}">
                    {{ $post->title }}
                    <div>
                        <x-button wire:click="edit({{ $post->id }})">
                            Editar
                        </x-button>
                        <x-danger-button wire:click="destroy({{ $post->id }})">
                            Eliminar
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>

        {{-- Paginación --}}
        <div class="mt-6" >
            {{ $posts->links('vendor.livewire.simple-tailwind') }}
            {{-- {{ $posts->links() }} --}}
        </div>
    </div>



    {{-- Modal de formulario de edición --}}
    <form wire:submit="update">
        <x-dialog-modal wire:model="postEdit.open">
            <x-slot name='title'>
                Actualizar Post
            </x-slot>
            <x-slot name='content'>

                {{-- Nombre --}}
                <div class="mb-4">
                    <x-label>Nombre</x-label>
                    <x-input class="w-full" wire:model='postEdit.title' />
                    <x-input-error for='postEdit.title' />
                </div>

                {{-- Contenido --}}
                <div class="mb-4">
                    <x-label>Contenido</x-label>
                    <x-textarea class="w-full" wire:model='postEdit.content'></x-textarea>
                    <x-input-error for='postEdit.content' />
                </div>

                {{-- Categoría --}}
                <div class="mb-4">
                    <x-label>Categoría</x-label>

                    <x-select class="w-full" wire:model='postEdit.category_id'>
                        <option value="" disabled>
                            Selecciona una categoría
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for='postEdit.category_id' />
                </div>

                {{-- Etiquetas --}}
                <div class="mb-4">
                    <x-label>Etiquetas</x-label>

                    <ul>
                        @foreach ($tags as $tag)
                            <li>
                                <label>
                                    <x-checkbox type="checkbox" wire:model="postEdit.tags"
                                        value="{{ $tag->id }}" />
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <x-input-error for='postEdit.tags' />
                </div>

            </x-slot>

            <x-slot name='footer'>
                {{-- Enviar --}}
                <div class="flex justify-end">
                    <x-danger-button class="mr-4" wire:click="$set('postEdit.open', false)">
                        Cancelar
                    </x-danger-button>

                    <x-button>Actualizar</x-button>
                </div>
            </x-slot>

        </x-dialog-modal>
    </form>


    @push('js')
        <script>
            Livewire.on('post-created', function(comment) {
                console.log(comment);
            });
        </script>
    @endpush


</div>
