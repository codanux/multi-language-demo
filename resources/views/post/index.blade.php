<x-app-layout :translations="['category' => $category]">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
                @include('post._card', ['post' => $post])
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
