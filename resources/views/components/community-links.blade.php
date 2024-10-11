@props(['links'])

<div class="md:col-span-1 bg-gray-800 p-6 rounded-lg shadow-md border border-gray-600 self-start">
    @foreach ($links as $link)
        <hr />
        <br />

        <li class="flex justify-between">
            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                href="{{ $link->link }}">{{ $link->title }}</a>

            <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                style="background-color: {{ $link->channel->color }}">
                {{ $link->channel->title }}
            </span>
        </li>

        <small>Contributed by: {{ $link->creator->name }} {{ $link->updated_at->diffForHumans() }}</small>
        <br><br>
    @endforeach
    {{ $links->links() }}
</div>
