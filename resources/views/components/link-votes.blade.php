<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
<form method="POST" action="/votes/{{ $linkid }}">
    @csrf

    <button type="submit" data-ripple-light="true"
        class="flex items-center space-x-1 rounded-full bg-red-800 p-1.5 border border-transparent text-center text-xs text-white transition-all shadow-md hover:shadow-lg focus:bg-red-700 focus:shadow-none active:bg-red-700 hover:bg-red-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none mr-2"
        type="button" {{ !Auth::user()->isTrusted() ? 'disabled' : '' }}>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
            <path
                d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
        </svg>
        <p>{{ $votes }}</p>
    </button>

    {{-- <button type="submit" class="p-0.5 border rounded-full hover:bg-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7" />
        </svg>
    </button>
    <span class="text-xs font-bold">{{ $votes }}</span>
    <button class="p-0.5 border rounded-full hover:bg-gray-500" disabled>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-3" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
        </svg>
    </button> --}}
</form>
