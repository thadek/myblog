<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-6">
                            <label for="content" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Content</label>
                            <textarea id="content" name="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline">{{ old('content', $post->content) }}</textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                Save Post
                            </button>
                        </div>
                        <div class="mb-4">
                            <label for="categories" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Categorías</label>
                            @foreach($categories as $category)
                                <div class="mt-2">
                                    <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" {{ $post->categories->contains($category->id) ? 'checked' : '' }}>
                                    <label for="category_{{ $category->id }}" class="ml-2 text-sm text-gray-600">{{ $category->nombre }}</label>
                                </div>
                            @endforeach
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>