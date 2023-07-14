<x-layout>
    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($systems) == 0)
            <p>No systems found.</p>
        @endif

        @foreach ($systems as $system)
            <!-- Item 1 -->
            <x-system-card :system="$system" />
        @endforeach
    </div>
    <div class="mt-6 p-4">
        {{$systems->links()}}
    </div>
</x-layout>
