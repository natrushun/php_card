<x-header>
    <x-slot:title>
        Create
    </x-slot>
    <div class="bg-white shadow-md rounded-lg overflow-hidden character-card">
        <form action="{{ route('character.store') }}" method="POST">
            @csrf
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">Új Karakter</h2>
                <label class="block">
                    <span class="text-gray-700">Name:</span>
                    <input type="text" name="name" value="{{ old('name', "") }}" class="form-input mt-1 w-50">
                </label>
                @error('name')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Defence:</span>
                    <input type="number" name="defence" value="{{ old('defence', "") }}" class="form-input mt-1 w-20">
                </label>
                @error('defence')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Strength:</span>
                    <input type="number" name="strength" value="{{ old('strength', "") }}" class="form-input mt-1 w-20">
                </label>
                @error('strength')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Accuracy:</span>
                    <input type="number" name="accuracy" value="{{ old('accuracy', "") }}" class="form-input mt-1 w-20">
                </label>
                @error('accuracy')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Magic Power:</span>
                    <input type="number" name="magic" value="{{ old('magic', "") }}" class="form-input mt-1 w-20">
                </label>
                @error('magic')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
                @if(auth()->user()->admin)
                <label class="block mt-4">
                    <input type="checkbox" name="enemy" class="form-checkbox mt-1" {{ old('enemy', false) ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Enemy</span>
                </label>
                @error('enemy')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
                @endif

                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Mentés</button>
            </div>
        </form>
    </div>
</x-header>
