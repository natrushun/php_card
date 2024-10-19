<x-header>
<x-slot:title>
    Places
</x-slot>
<div class="max-w-6xl mx-auto flex flex-wrap gap-8">
    @foreach ($places as $place)
    <div class="w-64 h-60 bg-white shadow-md rounded-lg overflow-hidden hover:border-blue-500 border-2 border-solid border-white relative">
        <div class="h-40 overflow-hidden">
            <img src="{{ $place->img_filename!=null ? Storage::url('images/'.$place->img_filename): 'images/default_place.jpg' }}" alt="bg-image" class="w-full h-full object-cover object-center">
        </div>
        <div class="p-4">
            <div class="absolute top-2 right-2">
                <a href="{{ route('place.edit', $place) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded mr-2">
                    Edit
                </a>
                <form action="{{ route('place.destroy', $place) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                        Delete
                    </button>
                </form>
            </div>
            
            <h2 class="text-xl font-semibold mb-2">{{ $place->name }}</h2>
        </div>
    </div>
    @endforeach
</div>
</x-header>