<x-admin-layout :translations="['category' => $category]">
    <x-slot name="header">
        <x-link name="admin.post.create"></x-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                        @foreach(config('multi-language.locales') as $locale)

                            @if($trans = $post->translations()->locale($locale)->first())
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ routeLocalized('admin.post.show', [$category, $trans], $locale) }}"> {!! $trans->name !!}</a>
                                </span>
                            @else
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ routeLocalized('admin.post.create', ['category' => $category, 'translation_of' => $post->translation_of, 'locale' => $locale], $locale) }}">
                                        {{ $locale }} Add
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
