@if (session('notice'))
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-3 m-6" role="alert">
        <p class="font-bold">Notice</p>
        <p>{{ session('notice') }}</p>
    </div>
@endif
@if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 m-6" role="alert">
        <p class="font-bold">Success</p>
        <p>{{ session('success') }}</p>
    </div>
@endif
