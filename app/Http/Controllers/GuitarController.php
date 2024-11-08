<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'type' => 'required',
            'colour' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'name' => 'required',
            'image' => 'required|image'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image/guitar'), $imageName);
        }

        $guitar = Guitar::create([
            'type' => $request->type,
            'brand' => $request->brand,
            'price' => $request->price,
            'colour' => $request->colour,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $guitars = Guitar::all();

        return to_route('guitars.index')->with('success', 'guitar created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guitar $guitar)
    {
        return view('guitars.show')->with('guitar', $guitar);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guitar $guitar)
    {
        return view('guitars.edit')->with('guitar', $guitar);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guitar $guitar)
    {
        //     $request->validate([
        //     'type' => 'required',
        //     'colour' => 'required',
        //     'brand' => 'required',
        //     'price' => 'required',
        //     'name' => 'required',
        //     'image' => 'required|image'
        // ]);

        // $data = $request->only(['name', 'price', 'colour', 'brand','image']);

        // // Check if a new image file is provided
        // if ($request->hasFile('image')) {
        //     // If there's an old image, delete it from the server
        //     if ($item->image && file_exists(public_path($guitar->image))) {
        //         unlink(public_path($guitar->image));
        //     }

        //     // Store the new image and add its filename to the data array
        //     $image = time() . '.' . $request->file('image')->extension();
        //     $request->file('image')->move(public_path('images/guitar'), $image);
        //     $data['image'] = $image;
        // }

        // $item->update($data);
        // return redirect()->route('guitar.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guitar $guitar)
    {
        $guitar->delete();

        return to_route('guitar.index')->with('success', 'Item deleted successfully!');

        // if($deleted){
        //     return to_route('items.index')->with('success', 'Item deleted successfully!');
        // }
        // else{
        //     return to_route('items.index')->with('danger', 'Deleted failed!');
        // }


    }
}


