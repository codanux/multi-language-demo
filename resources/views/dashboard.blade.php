<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($categories as $category)
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-2">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2"><a href="{{ routeLocalized('category.show', $category) }}" class="underline text-gray-900 dark:text-white">{!! $category->name !!}</a></div>
                        <p class="text-gray-700 text-base">
                            {{ __('routes-names.post.index') }} {!! $category->posts_count !!}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        @foreach($category->tags as $tag)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            {!! $tag->name !!}
                        </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
