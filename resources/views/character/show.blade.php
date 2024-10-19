<x-header>
    <x-slot:title>
        {{ $character->name }}
    </x-slot>
    
    <div class="bg-white shadow-md rounded-lg overflow-hidden character-card">
        <div class="p-4">
            @if (isset($success))
            <div class="bg-green-200 text-green-800 p-4 mb-4 rounded-md">
                {{ $success }}
            </div>
        @endif
            <h2 class="text-xl font-semibold mb-2">{{ $character->name }}</h2>
            <p><strong>Defence:</strong> {{ $character->defence }}</p>
            <p><strong>Strength:</strong> {{ $character->strength }}</p>
            <p><strong>Accuracy:</strong> {{ $character->accuracy }}</p>
            <p><strong>Magic Power:</strong> {{ $character->magic }}</p>
            <div class="flex items-center mt-4">
                @if(!$character->enemy)
                <div>
                    <a href="{{ route('contest.store',$character->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded mr-2">
                        Új mérkőzés
                    </a>
                </div>
                @endif
                <div>
                    <a href="{{route('character.edit', $character)}}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mr-2">
                        Edit
                    </a>
                </div>
                <div>
                    <form action="{{ route('character.destroy', $character) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded ">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <h3 class="text-lg font-semibold mt-4 mb-2">Contests:</h3>
            <div class="flex flex-wrap gap-4">
                @foreach ($character->contests as $contest)
                <a href="{{route('contest.show',$contest)}}">
                    <div class="bg-blue-200 rounded-lg p-2 transition-colors duration-300 hover:bg-blue-400">
                        <p>{{ $contest->place->name }} -
                            {{ $contest->characters()->where('enemy', !($character->enemy))->first()->name }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-header>
