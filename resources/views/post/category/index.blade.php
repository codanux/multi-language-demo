<x-app-layout>
    <x-slot name="header">
       <x-link name="category.create"></x-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($categories as $category)
                @include('post.category._card')
            @endforeach
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>
