<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

// #[Lazy]
class Formulario extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $categories;
    public $tags;

    public PostCreateForm $postCreate;
    public PostEditForm $postEdit;

    #[Url(as: 's')]
    public $search = '';

    // public $posts;


    // Mëtodo para inicializar las propiedades Mount
    //Clico de vida de un componente
    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
        /*  $this->posts = Post::all(); */
    }

    public function updating($property, $value)
    {
        if ($property == 'posCreate.category_id') {
            if ($value > 3) {
                throw new \Exception('No puedes seleccionar una categoria mayor a 3');
            }
        }
    }

    public function save()
    {
        //Validaciones con PostCreateForm
        $this->postCreate->save();
        $this->resetPage(pageName: 'pagePost'); //Resetea la paginación

        // Refresca la lista de posts
        /* $this->posts = Post::all(); */

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
        /*  $this->posts = Post::all(); */ //Refrescar listado dinamico

        // Disparar evento
        $this->dispatch('post-created', 'Articulo actualizado');
    }

    // Método para eliminar un post
    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();

        /* $this->posts = Post::all(); */ //Refrescar listado dinamico
        // Disparar evento
        $this->dispatch('post-created', 'Articulo eliminado');
    }

    /*  public function placeholder(){
        return view('livewire.placeholder.skeleton');
    } */
    // Método para renderizar la vista
    public function render()
    {
        $posts = Post::orderBy('id', 'desc')
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->paginate(5, pageName: 'pagePost');

        return view('livewire.formulario', compact('posts'));
    }
}
