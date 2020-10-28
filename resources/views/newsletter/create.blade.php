<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ routeLocalized('newsletter.create') }}" method="post">
                    @csrf

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" name="name" type="text" value="{{ old('name') }}" class="mt-1 block w-full" autofocus />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" name="email" type="text" value="{{ old('email') }}" class="mt-1 block w-full" autofocus />
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>

                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <x-jet-button>
                                {{ __('Subscription') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
