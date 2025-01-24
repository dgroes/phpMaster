<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Formulario extends Component
{
    public $categories;
    public $tags;

    public PostCreateForm $postCreate;
    public PostEditForm $postEdit;

    public $posts;


    // Mëtodo para inicializar las propiedades Mount
    //Clico de vida de un componente
    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }

    public function updating($property, $value){
        if($property == 'posCreate.category_id'){
            if($value > 3){
                throw new \Exception('No puedes seleccionar una categoria mayor a 3');
            }
        }
    }

    /* public function updated($property, $value){}
    } */

    public function hydrate(){}

    public function dehydrate(){}

    // Método para guarda el post
    public function save()
    {
        //Validaciones con PostCreateForm
        $this->postCreate->save();

        // Refresca la lista de posts
        $this->posts = Post::all();

        // Disparar evento
        $this->dispatch('post-created', 'Nuevo articulo creado', 'success');
    }

    // Método para editar un post
    public function edit($postId)
    {
        $this->resetValidation();
        $this->postEdit->edit($postId);
    }

    // Método para actualizar un post
    public function update()
    {
        $this->postEdit->update();
        $this->posts = Post::all(); //Refrescar listado dinamico

        // Disparar evento
        $this->dispatch('post-created', 'Articulo actualizado');
    }

    // Método para eliminar un post
    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();

        $this->posts = Post::all(); //Refrescar listado dinamico
        // Disparar evento
        $this->dispatch('post-created', 'Articulo eliminado');
    }

    // Método para renderizar la vista
    public function render()
    {
        return view('livewire.formulario');
    }
}
