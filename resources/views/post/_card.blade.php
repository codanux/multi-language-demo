<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
    <div class="px-6 py-4">
        <div class="float-right">
            {!! __('Author: :author', ['author' => $post->user->name]) !!}
        </div>

        <div class="font-bold text-xl mb-2">
            <a href="{{ routeLocalized('post.show', [$post->category, $post]) }}" class="underline text-gray-900 dark:text-white">{!! $post->name !!}</a>
        </div>
        <p class="text-gray-700 text-base">
            {!! \Illuminate\Support\Str::limit($post->body, 150) !!}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach($post->tags as $tag)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            {!! $tag->name !!}
        </span>
        @endforeach
    </div>
</div>
