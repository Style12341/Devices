@props(['device'])


<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $device->logo ? asset('storage/' . $device->logo) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/devices/{{ $device->id }}">{{ $device->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $device->company }}</div>
            <x-device-tags :tagsCsv="$device->tags" />


            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $device->location }}
            </div>
        </div>
    </div>
</x-card>
