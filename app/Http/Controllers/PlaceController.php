<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $this->authorize('viewAny',Place::class);
        return view('place.index', ['places' => Place::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Place::class);
        return view('place.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',Place::class);
        $validated = $request->validate(
            [
                'name' => 'required|unique:places',
                'img_filename' => 'required|image',
            ]
        );
        if ($request->hasFile('img_filename')) {
            $file = $request->file('img_filename');
            $fname = $file->hashName();
            Storage::disk('public')->put('images/' . $fname, $file->get());
            $validated['img_filename'] = $fname;
        }
        Place::create($validated);
        return redirect()->route('place.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        $this->authorize('update',$place);
        return view('place.edit', ['place' => $place]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $this->authorize('update',$place);
        $validated = $request->validate(
            [
                'name' => [
                    'required',
                    Rule::unique('places')->ignore($place->id),
                ],
                'img_filename' => 'nullable|image',
            ]
        );
        if ($request->hasFile('img_filename')) {
            $old = $place->img_filename;
            if ($old) {
                Storage::disk('public')->delete('images/' . $old);
            }

            $file = $request->file('img_filename');
            $fname = $file->hashName();
            Storage::disk('public')->put('images/' . $fname, $file->get());


            $validated['img_filename'] = $fname;
        } else {
            $validated['img_filename'] = $place->img_filename;
        }

        $place->update($validated);
        return redirect()->route('place.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $this->authorize('delete',$place);
        $old = $place->img_filename;
        if ($old) {
            Storage::disk('public')->delete('images/' . $old);
        }
        $place->delete();
        return redirect()->route('place.index');
    }
}
