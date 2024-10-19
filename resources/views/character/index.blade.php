<x-header>
    <x-slot:title>
        Characters
    </x-slot>
    <h1 class="text-4xl font-semibold mb-8">Karakterek</h1>
    @if (isset($success))
        <div class="bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ $success }}
        </div>
    @endif
    <div class="max-w-6xl mx-auto flex flex-wrap gap-8">
        @foreach ($characters as $c)
            <a href="{{ route('character.show', $c) }}">
                <div
                    class="bg-white shadow-md rounded-lg overflow-hidden hover:border-blue-500 border-2 border-solid border-white ">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $c->name }}</h2>
                        <p class="mb-2"><strong>Defence:</strong> {{ $c->defence }}</p>
                        <p class="mb-2"><strong>Strength:</strong> {{ $c->strength }}</p>
                        <p class="mb-2"><strong>Accuracy:</strong> {{ $c->accuracy }}</p>
                        <p class="mb-2"><strong>Magic Power:</strong> {{ $c->magic }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-header>

