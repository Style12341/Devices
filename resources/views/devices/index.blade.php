<x-layout>
    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($devices) == 0)
            <p>No devices found.</p>
        @endif

        @foreach ($devices as $device)
            <!-- Item 1 -->
            <x-device-card :device="$device" />
        @endforeach
    </div>
    <div class="mt-6 p-4">
        {{$devices->links()}}
    </div>
</x-layout>
