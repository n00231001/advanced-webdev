<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;
use App\Models\Guitar;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, guitar $guitar)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:100',
        ]);

        $guitar->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'guitar_id' => $guitar->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(guitar $guitar)
    {
        $guitar->load('reviews.user');
        return view('guitars.show', compact('guitar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {

        if (auth()->user()->id !== $review->user_id && auth()->user()->role !=='admin') {
            return redirect()->route('guitars.index')->with('error','Access denied');
        }

        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $review->update($request->only(['rating','comment']));

        return redirect()->route('guitars.show', $review->guitar_id)
                         ->with('success', 'review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
