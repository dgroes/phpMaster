<div>

    {{-- Formulario de creación de un Post --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Crear un nuevo Post</h2>
        <form wire:submit="save">
            {{-- Nombre --}}
            <div class="mb-4">
                <x-label>Nombre</x-label>
                <x-input class="w-full" wire:model='postCreate.title' />

                    <x-input-error for='postCreate.title'/>

            </div>

            {{-- Contenido --}}
            <div class="mb-4">
                <x-label>Contenido</x-label>
                <x-textarea class="w-full" wire:model='postCreate.content'></x-textarea>
                <x-input-error for='postCreate.content'/>

            </div>

            {{-- Categoría --}}
            <div class="mb-4">
                <x-label>Categoría</x-label>

                <x-select class="w-full" wire:model='postCreate.category_id'>
                    <option value="" disabled>
                        Selecciona una categoría
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    content
                </x-select>
                <x-input-error for='postCreate.category_id'/>
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
                <x-input-error for='postCreate.tags'/>
            </div>

            {{-- Enviar --}}
            <div class="flex justify-end">
                <x-button>Crear</x-button>
            </div>


        </form>
    </div>

    {{-- Listado de los Posts --}}
    <div class="bg-white shadow rounded-lg p-6 mt-6">
        <h2 class="text-lg font-semibold mb-4">Listado de Posts</h2>
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
    </div>

    {{-- Modal de formulario de edición --}}
    <form wire:submit="update">
        <x-dialog-modal wire:model="open">
            <x-slot name='title'>
                Actualizar Post
            </x-slot>
            <x-slot name='content'>

                {{-- Nombre --}}
                <div class="mb-4">
                    <x-label>Nombre</x-label>
                    <x-input class="w-full" wire:model='postEdit.title' />
                    <x-input-error for='postEdit.title'/>
                </div>

                {{-- Contenido --}}
                <div class="mb-4">
                    <x-label>Contenido</x-label>
                    <x-textarea class="w-full" wire:model='postEdit.content'></x-textarea>
                    <x-input-error for='postEdit.content'/>
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
                    <x-input-error for='postEdit.category_id'/>
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
                    <x-input-error for='postEdit.tags'/>
                </div>

            </x-slot>

            <x-slot name='footer'>
                {{-- Enviar --}}
                <div class="flex justify-end">
                    <x-danger-button class="mr-4" wire:click="$set('open', false)">
                        Cancelar
                    </x-danger-button>

                    <x-button>Actualizar</x-button>
                </div>
            </x-slot>

        </x-dialog-modal>
    </form>

</div>
