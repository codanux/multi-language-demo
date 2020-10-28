<x-admin-layout :translations="['category' => $category]">
    <x-slot name="header">
        <x-link name="admin.post.index"></x-link>
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
                        <div class="font-bold text-xl mb-2"><a href="{{ routeLocalized('admin.post.show', [$post->category, $post]) }}" class="underline text-gray-900 dark:text-white">{!! $post->name !!}</a></div>
                        <p class="text-gray-700 text-base">
                            {!! \Illuminate\Support\Str::limit($post->body, 150) !!}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        @foreach(config('multi-language.locales') as $locale => $localLabel)

                            @if($trans = $post->translations->firstWhere('locale', $locale))
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ routeLocalized('admin.post.show', [$trans->category, $trans], $locale) }}"> {!! $trans->name !!}</a>
                                </span>
                            @else
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ routeLocalized('admin.post.create', ['category' => $category, 'translation_of' => $post->translation_of, 'locale' => $locale], $locale) }}">
                                        {{ $localLabel }} Add
                                    </a>
                                 </span>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</x-admin-layout>
