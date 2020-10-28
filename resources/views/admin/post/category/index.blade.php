<x-admin-layout>
    <x-slot name="header">
        <x-link name="admin.category.create"></x-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($categories as $category)
                @include('admin.post.category._card')
            @endforeach
            {{ $categories->links() }}
        </div>
    </div>
</x-admin-layout>
