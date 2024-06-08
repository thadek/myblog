<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    
    public function indexAdmin()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function index()
    {
        $posts = Post::with('user')->get();
        return view('welcome', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

   
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:1',
            'categories' => 'required|array'
        ]);
    
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
      
        $post->user_id = auth()->id();
        $post->save();
       
        foreach ($request->categories as $categoryId) {
            $post->categories()->attach($categoryId);
        }

     
    
        return redirect()->route('posts.index');
    }

    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    
    public function update(UpdatePostRequest $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:1',
            'categories' => 'required|array'
        ]);
    
        $post->update($request->only('title', 'content'));
    
        $post->categories()->sync($request->categories);
    
        return redirect()->route('posts.index');
    }

    
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
