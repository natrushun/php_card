<x-header>

    <x-slot:title>
        Edit Place
    </x-slot>

    <div class="bg-white shadow-md rounded-lg overflow-hidden character-card">
        <form action="{{ route('place.update',$place) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">Helyszín szerkesztése</h2>
                <label class="block">
                    <span class="text-gray-700">Név:</span>
                    <input type="text" name="name" value="{{ old('name', "$place->name") }}" class="form-input mt-1 w-50">
                </label>
                @error('name')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Kép:</span>
                    <input type="file" name="img_filename">
                </label>
                @error('img_filename')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Mentés</button>
        </form>
    </div>
</x-header>