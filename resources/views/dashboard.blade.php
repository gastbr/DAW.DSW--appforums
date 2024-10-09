<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4 p-6">
                    <div class="col-span-2 p-6 text-gray-900 dark:text-gray-100">
                        @foreach ($links as $link)
                        <hr />
                        <br />
                        <li><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{$link->link}}">{{$link->title}}</a></li>
                        <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
                        <br><br>
                        @endforeach
                        {{$links->links()}}
                    </div>
                    <div class="grid col-span-1">
                        <x-community-add-link />
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</x-app-layout>