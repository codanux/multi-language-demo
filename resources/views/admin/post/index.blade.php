<x-admin-layout :translations="['category' => $category]">
    <x-slot name="header">
        <x-link name="admin.post.create"></x-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
                @include('admin.post._card')
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</x-admin-layout>
