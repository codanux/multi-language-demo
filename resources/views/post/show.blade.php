<x-app-layout :translations="['post' => $post]">
    <x-slot name="header">
        <h2 class="float-right font-semibold text-xl text-gray-800 leading-tight">
            {!! $post->category->name !!}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! $post->name !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-6 py-4">
                    <p class="text-gray-700 text-base">
                        {!! $post->body !!}
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
