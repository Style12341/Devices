@props(['system'])


<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $system->logo ? asset('storage/' . $system->logo) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/systems/{{ $system->id }}">{{ $system->name }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $system->company }}</div>
            <x-system-tags :tagsCsv="$system->tags" />


            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $system->location }}
            </div>
        </div>
    </div>
</x-card>
