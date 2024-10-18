<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-alert-message />
                <div class="grid grid-cols-3 gap-4 p-6">
                    <div class="col-span-2 text-gray-900 dark:text-gray-100">
                        <x-community-links :links='$links' />
                    </div>
                    <div class="grid col-span-1">
                        <x-community-add-link :channels='$channels' />
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


</x-app-layout>
