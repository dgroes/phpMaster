<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->get();

        // return $posts;
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;
        $post->save();

        return redirect('/posts');
    }

    public function show($post)
    {
        $post = Post::find($post);
        // return $post;

        return view('posts.show', compact('post'));


        /* return view('posts.show', [
            'post' => $post
        ]); */
    }
}
