<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{  $post->title  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <p class="text-lg mt-2">{{ $post->content }}</p>

                    <div class="mt-4">
                        <h3 class="text-lg font-semibold">Categorías:</h3>
                        <ul>
                            @foreach($post->categories as $category)
                                <li>{{ $category->nombre }}</li>
                            @endforeach
                        </ul>
                    </div>
                
         
                </div>
            </div>
        </div>
    </div>
</x-app-layout>