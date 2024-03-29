<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;

class RaceImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Race $race)
    {
        return view('admin.raceimages.index', compact('race'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Race $race)
    {
        return view('admin.raceimages.new', compact('race'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Race $race)
    {
        dd($request->all());
        $images = $request->file('images');

        foreach ($images as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images/races/uploads'), $imageName);
        }

        return view('admin.raceimages.index', compact('race'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
