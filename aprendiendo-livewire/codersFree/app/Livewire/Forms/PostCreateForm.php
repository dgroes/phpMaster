<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;


class PostCreateForm extends Form
{


    #[Rule('required|min:6')]
    public $title;

    #[Rule('required|min:10')]
    public $content;

    #[Rule('required|exists:categories,id')]
    public $category_id = '';

    #[Rule('required|array')]
    public $tags = [];

    #[Rule('nullable|image|max:1024')]
    public $image;

    public function save()
    {
        $this->validate(); //Llamar a las validaciones de Froms/PostCreateForm

        // Una manera de crear un post con el PostCreateForm
        /* $post = Post::create([
            'category_id' => $this->postCreate->category_id,
            'title' => $this->postCreate->title,
            'content' => $this->postCreate->content,
        ]); */

        // Otra manera de crear un post con el PostCreateForm
        $post = Post::create($this->toArray());

        // Asocia las etiquetas al post
        $post->tags()->attach($this->tags);

        // Guarda la imagen en el disco
        if ($this->image) {
            $post->image_path = $this->image->store('posts');
            $post->save();
        }

        // Limpia el formulario
        $this->reset();
    }
}
