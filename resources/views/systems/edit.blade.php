<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a System
            </h2>
            <p class="mb-4">Edit: {{$system->name}}</p>
        </header>
        <form method="POST" action="/systems/{{$system->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                    value="{{ $system->company }}" />
                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">System name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    placeholder="Example: Senior Laravel Developer" value="{{ $system->name }}" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">System Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Example: Remote, Boston MA, etc" value="{{  $system->location  }}" />
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{  $system->email  }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{  $system->tags }} }}" />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    System Picture
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                <img class="w-48 mr-6 mb-6"
                    src="{{ $system->logo ? asset('storage/' . $system->logo) : asset('/images/no-image.png') }}"
                    alt="" />
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    System Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{ $system->description }}" </textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
