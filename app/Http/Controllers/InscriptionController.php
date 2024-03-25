<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insurance;
use App\Models\Race;
use App\Models\Inscription;

class InscriptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.inscriptions.index');
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
            Insurance::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('race.index')->with('success', 'Race successfully created!');
    }

    /**
     * Prints a PDF containing all the competitors inscripted in a race
     */
    public function print(Race $race){
        //$inscriptions = Inscription::with('competitor')->where('race', $race)->get();
        $inscriptions = Inscription::where('race', $race->id)->with('competitors')->orderBy('competitor')->get();
        return view('admin.inscriptions.pdf', compact(['inscriptions', 'race']));
    }
}
