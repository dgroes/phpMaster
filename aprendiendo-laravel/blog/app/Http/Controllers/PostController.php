<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Mail\PostCreateMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->paginate(10);

        // return $posts;
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {

        // return $request->all();

        //Se movieron las validaciones a StoreRequest.php
        /*  $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'slug' => 'required|unique:post',
            'category' => 'required',
            'content' => 'required',

        ]); */

        //Cons asignación masiva:
        $post = Post::create($request->all());

        Mail::to('pepito@prueba.com')->send(new PostCreateMail($post));

        return redirect()->route('posts.index');

        /* Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category' => $request->category,
            'content' => $request->title,
        ]); */

        /* $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category = $request->category;
        $post->content = $request->content;
        $post->save(); */
    }

    public function show(Post $post)
    {
        // $post = Post::find($post);
        // return $post;

        return view('posts.show', compact('post'));


        /* return view('posts.show', [
            'post' => $post
        ]); */
    }

    public function edit(Post $post)
    {
        // $post = Post::find($post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // $post = Post::find($post);

        $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'slug' => "required|unique:post,slug,{$post->id}",
            'category' => 'required',
            'content' => 'required',

        ]);

        //Con asignación masiva:
        $post->update($request->all());
        return redirect()->route('posts.show', $post);

        /* $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category = $request->category;
        $post->content = $request->content;
        $post->save(); */
    }

    public function destroy(Post $post)
    {
        // $post = Post::find($post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
