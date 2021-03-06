<x-admin-layout :translations="['category' => $category, 'post' => $post]">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-6 py-4">
                    <div class="float-right">
                        {!! $post->category->name !!}
                    </div>
                    <div class="font-bold text-xl mb-2">{!! $post->name !!}</div>
                    <p class="text-gray-700 text-base">
                        {!! $post->body !!}
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
