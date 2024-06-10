




<x-app-layout>



    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear nuevo Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


            @if ($errors->any())
                <div class="text-red-400 px-6 pt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Titulo</label>
                            <input type="text" id="title" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-6">
                            <label for="content" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2"></label>
                            <textarea hidden id="content" name="content" class=""></textarea>
                            <trix-editor input="content"></trix-editor>
                            <div class="mb-4">
                                <label for="thumbnail" class="block text-gray-700 dark:text-gray-300 text-sm font-bold m-2">Thumbnail</label>
                                <input type="file" id="thumbnail" name="thumbnail" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                        
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                Crear Post
                            </button>
                        </div>
                        <div class="mb-4 mt-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Categorías</label>
                            @foreach($categories as $category)
                                <div class="mt-2">
                                    <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
                                    <label for="category_{{ $category->id }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Is published -->
                        <div class="mb-4">
                            <label for="is_published" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Visible</label>
                            <input type="checkbox" id="is_published" name="is_published" value="1">

                        </div>
                    
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>

@section("scripts")
<script src=”https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity=”sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==” crossorigin=”anonymous” defer></script>
@endsection