<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

   
    public function create()
    {
        return view('posts.create');
    }

   
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:1'
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    
    public function edit(Post $post)
    {
        
    }

    
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    
    public function destroy(Post $post)
    {
        //
    }
}
