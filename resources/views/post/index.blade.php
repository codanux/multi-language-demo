<x-app-layout :translations="['category' => $category]">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2"><a href="{{ routeLocalized('post.show', [$post->category, $post]) }}" class="underline text-gray-900 dark:text-white">{!! $post->name !!}</a></div>
                        <p class="text-gray-700 text-base">
                            {!! \Illuminate\Support\Str::limit($post->body, 150) !!}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        @foreach($post->translations as $trans)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                <a href="{{ routeLocalized('post.show', [$trans->category, $trans], $trans->locale) }}"> {!! $trans->name !!}</a>
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
