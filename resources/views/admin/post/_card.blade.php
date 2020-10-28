<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
    <div class="px-6 py-4">
        <div class="float-right">
            <a href="{{ routeLocalized('admin.post.edit', [$post->category, $post]) }}" class="underline text-gray-900 dark:text-white">{{ __('Edit') }}</a>
        </div>
        <div class="font-bold text-xl mb-2">
            <a href="{{ routeLocalized('admin.post.show', [$post->category, $post]) }}" class="underline text-gray-900 dark:text-white">{!! $post->name !!}</a>
        </div>
        <p class="text-gray-700 text-base">
            {!! \Illuminate\Support\Str::limit($post->body, 150) !!}
        </p>
    </div>

    <div class="flex justify-between px-6 pt-2 pb-2">
        <div>
            @foreach($post->tags as $tag)
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                {!! $tag->name !!}
             </span>
            @endforeach
        </div>


        <div>
            @foreach(config('multi-language.locales') as $locale => $label)
                @if($trans = $post->translations->firstWhere('locale', $locale))
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    <a href="{{ routeLocalized('admin.post.show', [$trans->category, $trans], $trans->locale) }}"> {!! $trans->name !!}</a>
                </span>
                @else
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    <a href="{{ routeLocalized('admin.post.store', [$post->category, 'translation_of' => $post->translation_of, 'locale' => $locale], $locale) }}">
                        {{ $label }} Add
                    </a>
                </span>
                @endif
            @endforeach
        </div>
    </div>
</div>
