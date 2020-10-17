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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
                        <div class="px-6 py-4">
                            <div class="float-right">
                                {!! $post->category->name !!}
                            </div>
                            <div class="font-bold text-xl mb-2"><a href="{{ routeLocalized('post.show', [$category, $post]) }}" class="underline text-gray-900 dark:text-white">{!! $post->name !!}</a></div>
                            <p class="text-gray-700 text-base">
                                {!! \Illuminate\Support\Str::limit($post->body, 50) !!}
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            @foreach($post->translations as $trans)
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                <a href="{{ routeLocalized('post.show', [$category,  $trans], $trans->locale) }}"> {!! $trans->name !!}</a>
                            </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}

            </div>
        </div>
    </div>
</x-app-layout>