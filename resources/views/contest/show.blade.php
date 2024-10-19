<x-header>
    <x-slot:title>
        Contest
    </x-slot>
    <x-slot:bg>
        
    </x-slot>
    <style>
        body {
            background-image: url('{{ asset($contest->place->img_filename!=null ? Storage::url('images/'.$contest->place->img_filename): 'images/default_place.jpg') }}');
            background-size: cover;
        }

    </style>

    @foreach ($contest->characters as $character)
        <div class="p-4 bg-white shadow-md mb-4">
            <h3 class="text-lg font-semibold">{{ $character->name }}</h3>
            <p>Defence: {{ $character->defence }}</p>
            <p>Strength: {{ $character->strength }}</p>
            <p>Accuracy: {{ $character->accuracy }}</p>
            <p>Magic: {{ $character->magic }}</p>
            @if ($character->enemy)
                <p>Életerő: {{ $contest->characters()->first()->pivot->enemy_hp }}</p>
            @else
                <p>Életerő: {{ $contest->characters()->first()->pivot->hero_hp }}</p>
            @endif
        </div>
    @endforeach

    @if (isset($contest->win))
        <div class="p-4 bg-{{ $contest->win ? 'green' : 'red' }}-500 text-white">
            <h2 class="text-2xl font-bold">{{ $contest->win ? 'Győzelem' : 'Vereség' }}</h2>
        </div>
    @else
        <form action="{{ route('contest.update', $contest) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="attack_type" id="attack-type" value="">

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mr-2"
                onclick="setAttackType('melee')">Melee</button>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mr-2"
                onclick="setAttackType('ranged')">Ranged</button>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded"
                onclick="setAttackType('magic')">Magic</button>


        </form>
    @endif
    <div class="p-4 bg-white shadow-md mb-4">
        <h3 class="text-lg font-semibold">Körök:</h3>
        <ul>
            <li>{!! nl2br($contest->history) !!}</li>
        </ul>
    </div>
    <script>
        function setAttackType(type) {
            document.getElementById('attack-type').value = type;
        }
    </script>
</x-header>
