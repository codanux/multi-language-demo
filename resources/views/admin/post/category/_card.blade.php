<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-2">
    <div class="px-6 py-4">
        <div class="flex justify-between font-bold text-xl mb-2">
            <a href="{{ routeLocalized('admin.category.show', $category) }}" class="underline text-gray-900 dark:text-white">
                {!! $category->name !!}
            </a>

            <a href="{{ routeLocalized('admin.category.edit', $category) }}">
                {{ __('Edit') }}
            </a>
        </div>
    </div>

    <div class="flex justify-between px-6 pt-2 pb-2">
        <div>
            @foreach($category->tags as $tag)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                {!! $tag->name !!}
             </span>
            @endforeach
        </div>
    </div>
</div>
