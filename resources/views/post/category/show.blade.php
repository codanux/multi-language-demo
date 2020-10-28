<x-app-layout :translations="['category' => $category]">
    <x-slot name="header">
        <x-link name="post.index"></x-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-900 text-center py-4 lg:px-4">
                <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LATEST 5</span>
                    <span class="font-semibold mr-2 text-left flex-auto">{{ __('routes-names.post.index') }}</span>
                </div>
            </div>

            @foreach($posts as $post)
                @include('post.card', ['post' => $post])
            @endforeach
            {{ $posts->links() }}

            </div>
        </div>
    </div>
</x-app-layout>
