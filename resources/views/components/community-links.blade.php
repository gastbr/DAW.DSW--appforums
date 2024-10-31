@props(['links'])

<div class="md:col-span-1 bg-gray-800 p-6 rounded-lg shadow-md border border-gray-600 self-start">
    @if ($links->isEmpty())
        No approved contributions yet.
    @else
        @foreach ($links as $link)
            <hr />
            <br />

            <li class="flex justify-between">
                <div class="flex items-center">
                    <x-link-votes votes="{{ $link->users()->count() }}" linkid="{{ $link->id }}" />
                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        href="{{ $link->link }}">{{ $link->title }}</a>
                </div>

                <span class="inline-block px-2 py-1 h-7 text-white text-sm font-semibold rounded"
                    style="background-color: {{ $link->channel->color }}">

                    <a href="/dashboard/{{ $link->channel->slug }}">
                        {{ $link->channel->title }}
                    </a>

                </span>

            </li>

            <small>Contributed by: {{ $link->creator->name }} {{ $link->updated_at->diffForHumans() }}</small>
            <br><br>
        @endforeach
        {{ $links->links() }}
    @endif
</div>
