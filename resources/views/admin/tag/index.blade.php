<x-admin-layout>
    <x-slot name="header">
        <x-link name="admin.tag.create"></x-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($tags as $tag)
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2"><a href="{{ routeLocalized('admin.tag.edit', [$tag]) }}" class="underline text-gray-900 dark:text-white">{!! $tag->name !!}</a></div>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        @foreach(config('multi-language.locales') as $locale => $localLabel)

                            @if($trans = $tag->translations->firstWhere('locale', $locale))
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ routeLocalized('admin.tag.edit', [$trans], $locale) }}"> {!! $trans->name !!}</a>
                                </span>
                            @else
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ routeLocalized('admin.tag.create', ['translation_of' => $tag->translation_of, 'locale' => $locale], $locale) }}">
                                        {{ $localLabel }} Add
                                    </a>
                                 </span>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
            {{ $tags->links() }}
        </div>
    </div>
</x-admin-layout>
