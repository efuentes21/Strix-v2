<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $races = Race::all();
        $races = Race::paginate(30);
        return view('admin.races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.races.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'unevenness' => 'required|numeric',
            'map' => 'required|string',
            'max_competitors' => 'required|integer',
            'distance' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'start' => 'nullable|string',
            'promotion' => 'nullable|string',
            'sponsorship' => 'nullable|numeric',
            'inscription' => 'nullable|numeric',
            'active' => 'required|boolean'
        ]);

        try {
            $race = Race::create($validatedData);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('race.index');
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
