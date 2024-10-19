<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use \Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Character::class);

        $characters = Auth::user()->characters;
        
        if (Auth::user()->admin){
            $enemys=Character::where('enemy', true)->get();
            foreach($enemys as $enemy){
                $characters->push($enemy);
            }
        }
        

        return view('character.index', ['characters' => $characters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Character::class);
        return view('character.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Character::class);
        $validated = $request->validate([
            'name' => 'required|unique:characters',
            'defence' => 'required|integer|min:0|max:20',
            'strength' => 'required|integer|min:0|max:20',
            'accuracy' => 'required|integer|min:0|max:20',
            'magic' => [
                'required',
                'integer',
                'min:0',
                'max:20',
                function ($attribute, $value, $fail) use ($request) {
                    $sum = (int) $request->defence + (int) $request->strength + (int) $request->accuracy + (int) $value;
                    if ($sum !== 20) {
                        $fail('The sum of defence, strength, accuracy, and magic power must be 20.');
                    }
                },
            ],
            'enemy' => [
                function ($attribute, $value, $fail) {
                    if (!auth()->user()->admin) {
                        $fail('Only admins can set the enemy field.');
                    }
                }
            ],
        ]);
        if ($request->has('enemy')) {
            $validated['enemy'] = true;
        } else {
            $validated['enemy'] = false;
        }
        $c = Character::create($validated);
        $c->user()->associate(Auth::user()->id)->save();

        return redirect()->route('character.index');
        //return view('character.index', ['characters' => $characters, 'success' => "A karakter sikeresen létrejött"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        $this->authorize('view',$character);
        return view('character.show', [
            'character' => $character/*->with([
            'contests'=>[
            'place',
            'characters',
            ],
            ])->get()*/
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $this->authorize('update', $character);
        return view('character.edit', ['character' => $character]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $this->authorize('update', $character);
        $validated = $request->validate(
            [
                'name' => [
                    'required',
                    Rule::unique('characters')->ignore($character->id),
                ],
                'defence' => 'required|integer|min:0|max:20',
                'strength' => 'required|integer|min:0|max:20',
                'accuracy' => 'required|integer|min:0|max:20',
                'magic' => [
                    'required',
                    'integer',
                    'min:0',
                    'max:20',
                    function ($attribute, $value, $fail) use ($request) {
                        $sum = (int) $request->defence + (int) $request->strength + (int) $request->accuracy + (int) $value;
                        if ($sum > 20) {
                            $fail('The sum of defence, strength, accuracy, and magic power must not exceed 20.');
                        }
                    },
                ],
            ]
        );
        $character->update($validated);
        return redirect()->route('character.index');
        //return view('character.show', ['character' => $character, 'success' => "a karakter sikeresen módosítva"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
       // $this->authorize('delete',$character);

        $contests = $character->contests;
        foreach ($contests as $contest) {
            $contest->delete();
        }
        $character->delete();

        return redirect()->route('character.index');
        //return redirect()->route('character.index')->with(['characters' => $characters, 'success' => "A törlés sikeresen megtörtént."]);


    }
}
