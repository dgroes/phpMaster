<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Formulario extends Component
{
    public $categories;
    public $tags = [];
    public $category_id = '';
    public $title = '';
    public $content = '';

    // Reglas de valiación con #Rule
    /*  #[Rule('required', message: 'El campo es requerido')]
    public $title;

    #[Rule('required')]
    public $content;

    #[Rule('required|exists:categories,id', as: 'categoría')]
    public $category_id = '';

    #[Rule('required|array')]
    public $selectedTags = [];
 */

   /*  #[Rule([
        'postCreate.category_id' => 'required|exists:categories,id',
        'postCreate.title' => 'required|min:6|string',
        'postCreate.content' => 'required|min:6|string',
        'postCreate.tags' => 'required|array|min:1'
    ])] */
    public $postCreate = [
        'category_id' => '',
        'title' => '',
        'content' => '',
        'tags' => []
    ];

    public $posts;

    public $postEditId = '';

    // Propiedades para el formulario de edición
    public $postEdit = [
        'category_id' => '2',
        'title' => 'mi tula',
        'content' => 'prueba de contenido',
        'tags' => [3, 1]
    ];

    public $open = false;

    public function rules(){
        return [
            'postCreate.category_id' => 'required|exists:categories,id',
            'postCreate.title' => 'required|min:6|string',
            'postCreate.content' => 'required|min:6|string',
            'postCreate.tags' => 'required|array|min:1'
        ];
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }


    public function save()
    {
        //Validaciones con Livewire
        $this->validate();

        //Validaciones con Laravel
        /*  $this->validate([
            'title' => 'required|min:6|string',
            'content' => 'required|min:6|string',
            'category_id' => 'required|exists:categories,id',
            'selectedTags' => 'required|array|min:1'
        ]); */



        // Una manera más corta del create
        $post = Post::create([
            'category_id' => $this->postCreate['category_id'],
            'title' => $this->postCreate['title'],
            'content' => $this->postCreate['content'],
        ]);

        $post->tags()->attach($this->postCreate['tags']);

        $this->reset(['postCreate']);

        $this->posts = Post::all();
    }

    public function edit($postId)
    {
        $this->resetValidation();

        $this->open = true;

        $this->postEditId = $postId;

        $post = Post::find($postId);
        $this->postEdit['category_id'] = $post->category_id;
        $this->postEdit['title'] = $post->title;
        $this->postEdit['content'] = $post->content;
        $this->postEdit['tags'] = $post->tags->pluck('id')->toArray();
    }

    public function update()
    {
        $this->validate([
            'postEdit.category_id' => 'required|exists:categories,id',
            'postEdit.title' => 'required|min:6|string',
            'postEdit.content' => 'required|min:6|string',
            'postEdit.tags' => 'required|array|min:1'
        ]);

        $post = Post::find($this->postEditId);
        $post->update([
            'category_id' => $this->postEdit['category_id'],
            'title' => $this->postEdit['title'],
            'content' => $this->postEdit['content'],
        ]);

        $post->tags()->sync($this->postEdit['tags']);

        $this->reset(['postEditId', 'postEdit', 'open']);
        $this->posts = Post::all(); //Refrescar listado dinamico
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();

        $this->posts = Post::all(); //Refrescar listado dinamico
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
