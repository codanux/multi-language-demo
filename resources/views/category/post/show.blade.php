<x-app-layout :translations="['category' => $post->category, 'post' => $post]">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-6 py-4">
                    <div class="float-right">
                        {!! $post->category->name !!}
                    </div>
                    <div class="font-bold text-xl mb-2"><a href="{{ routeLocalized('post.show', $post) }}" class="underline text-gray-900 dark:text-white">{!! $post->name !!}</a></div>
                    <p class="text-gray-700 text-base">
                        {!! $post->body !!}
                    </p>

                    <p class="text-gray-700 text-base">
                        {!! $post->body !!}
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
