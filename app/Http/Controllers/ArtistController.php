<?php

namespace App\Http\Controllers;

use App\Models\Artist;
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

        $artists = Artist::all();
        return view('artists.create', compact('artists'));
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
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/artists'),$image);
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
    public function edit(Artist $Artist)
    {
        $guitars = Guitars::all();
        $artistsGuitars = $artists->guitars->pluck('id')->toArray();
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

        $artists->update($validated);

        if($request->has('guitars')) {
            $artists->guitars()->sync($request->guitars);
        }

        return redirect()->route('artists.index')->with('success', 'artist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artists->guitars()->detach();
        $artists->delete();

        return redirect()->route('artists.index')->with('success', 'artists deleted successfully');
    }
}
