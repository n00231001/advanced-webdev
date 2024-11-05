<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use Illuminate\Http\Request;

class GuitarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guitars = Guitar::all();
        return view('guitars.index', compact('guitars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|max:500',
            'brand' => 'required',
            'price' => 'required|integer'
        ]);

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/guitar'), $imageName);
        }

        Guitar::create([
            'name' => $request->title,
            'type' => $request->type,
            'brand' => $request->brand,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('guitar.index')->with('success', 'guitar created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guitar $guitar)
    {
        return view('guitar.show')->with('guitar', $guitar);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guitar $guitar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guitar $guitar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guitar $guitar)
    {
        //
    }
}
