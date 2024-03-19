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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'unevenness' => 'required|numeric',
            'map' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'max_competitors' => 'required|integer',
            'distance' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'start' => 'nullable|string',
            'promotion' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sponsorship' => 'nullable|numeric',
            'inscription' => 'nullable|numeric',
            'active' => 'required|boolean'
        ]);

        try {
            $image = $request->file('map');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validatedData['map'] = $imageName;
            $image = $request->file('promotion');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validatedData['promotion'] = $imageName;
            Race::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('race.index')->with('success', 'Race successfully created!');
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
    public function edit(Race $race)
    {
        return view('admin.races.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $race = Race::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'unevenness' => 'required|numeric',
            'map' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'max_competitors' => 'required|integer',
            'distance' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'start' => 'required|string',
            'promotion' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'inscription' => 'nullable|numeric',
            'active' => 'required|boolean'
        ]);

        try {
            $race->name = $request->name;
            $race->description = $request->description;
            $race->unevenness = $request->unevenness;
            $race->max_competitors = $request->max_competitors;
            $race->distance = $request->distance;
            $race->date = $request->date;
            $race->time = $request->time;
            $race->start = $request->start;
            $race->inscription = $request->inscription;
            $race->active = $request->active;

            if($request->hasFile('map')) {
                $image = $request->file('map');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $race->map = $imageName;
            }
            if($request->hasFile('promotion')) {
                $image = $request->file('promotion');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $race->promotion = $imageName;
            }
            $race->update();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('race.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the data of a race to the user.
     */
    public function inspection($raceId)
    {
        $race = Race::findOrFail($raceId);
        return view('user.races.index', compact('race'));
    }
}
