<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog Laravel PWA </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
     <!-- resources/views/home.blade.php -->
@extends('layouts.app') <!-- Supone que tienes un layout llamado 'app.blade.php' -->

@section('title', 'Página Principal') <!-- Título de la página -->

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Últimos Posts</h1>
        
        <form method="GET" action="{{ route('home') }}">
            <select name="category_id" onchange="window.location.href='/posts?category_id=' + this.value">
                <option value="">- Sin filtro -</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>
        
        @foreach ($posts as $post)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 flex-col">
                <div class="flex">
                    <div class="w-64 h-64 flex-none bg-cover text-center overflow-hidden" style="background-image: url('{{ asset('storage/thumbnails/'.$post->thumbnail) }}')" title="{{ $post->title }}"></div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="mb-4">{!! Str::limit($post->content, 150) !!}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-600">
                            Leer más
                        </a>
                        <div class="pt-4 text-gray-600 dark:text-gray-400 text-sm">
                            Publicado el {{ $post->created_at->format('d M, Y') }} por 
                            <span class="font-semibold">{{ $post->user->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

  
</div>


    </body>
</html>
