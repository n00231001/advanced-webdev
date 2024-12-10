<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Guitar;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::with('guitars')->get();
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('guitars.index')->with('error', 'Access denied');
        }

        $guitars = Guitar::all();
        return view('artists.create', compact('guitars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Artist $artist)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('artists.index')->with('error', 'Access denied');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string|max:1000',
            'guitars' => 'array',
        ]);

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/artists'), $image);
            $validated['image'] = $image;
        }

        $artist = Artist::create($validated);

        if ($request->has('guitars')) {
            $artist->guitars()->attach($request->guitars);
        }
        return redirect()->route('artists.index')->with('success', 'Artist created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        $artist->load('guitars');
        return (view('artists.show', compact('artist')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        $guitars = Guitar::all();
        $artistsGuitars = $artist->guitars->pluck('id')->toArray();

        foreach($artistsGuitars as $guitar){
            echo $guitar;
        }

        return view('artists.edit', compact('artist', 'guitars', 'artistsGuitars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $validated = $request->validate([
             'name' => 'required|string|max:255',
             'image' => 'nullable|image|max:2048',
             'description' => 'nullable|string|max:1000',
             'guitars' => 'array',
         ]);

         $artist->update($validated);

        //  if ($request->has('guitars')) {
        //      $artist->guitars()->sync($request->guitars);
        //  }

        # Might get eg fender stratocaster twice, drop duplicates
        $guitars = array_unique($request->get('guitars'));

        $artist->guitars()->sync($guitars);



        return redirect()->route('artists.index')->with('success', 'artist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->guitars()->detach();
        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'artists deleted successfully');
    }
}
