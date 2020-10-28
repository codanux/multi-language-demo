<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ routeLocalized('admin.tag.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="translation_of" value="{{ old('translation_of') }}">

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" name="name" type="text" value="{{ old('name') }}" class="mt-1 block w-full" autofocus />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <div class=" col-span-6 sm:col-span-4">
                                    <x-jet-label for="locale" value="{{ __('Locale') }}" />

                                    <div class="flex">
                                        @foreach(config('multi-language.locales') as $key => $locale)
                                            <div class="mr-4">
                                                <input type="radio" class="form-radio" id="locale_{{ $key }}" name="locale" value="{{ $key }}" @if(old('locale') == $key){{ 'checked' }}@endif>
                                                <label class="font-medium text-sm text-gray-700" for="locale_{{ $key }}">{{ $locale }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <x-jet-input-error for="locale" class="mt-2" />
                                </div>


                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <x-jet-button>
                                {{ __('Add') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-admin-layout>
