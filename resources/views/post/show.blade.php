<x-app-layout>
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
                </div>
                <div class="px-6 pt-4 pb-2">
                    @foreach($post->translations as $trans)
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            <a href="{{ routeLocalized('post.show', $trans, $trans->locale) }}"> {!! $trans->name !!}</a>
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
