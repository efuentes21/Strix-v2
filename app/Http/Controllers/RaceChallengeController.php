<?php

namespace App\Http\Controllers;

use App\Models\RaceChallenge;
use App\Http\Requests\StoreRaceChallengeRequest;
use App\Http\Requests\UpdateRaceChallengeRequest;
use Illuminate\Http\Request;
use Exception;

class RaceChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $racechallenge = RaceChallenge::all();
        return view('admin.racechallenge.index', compact('racechallenge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.racechallenge.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cif' => 'required|string|max:9',
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'principal' => 'required|boolean',
            'active' => 'required|boolean'
        ]);

        try {
            $image = $request->file('logo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validatedData['logo'] = $imageName;
            $RaceChallenge = RaceChallenge::create($validatedData);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('RaceChallenge.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RaceChallenge $RaceChallenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RaceChallenge $RaceChallenge)
    {
        return view('admin.racechallenge.edit', compact('RaceChallenge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $RaceChallenge = RaceChallenge::findOrFail($id);

        $request->validate([
            'cif' => 'required',
            'name' => 'required',
            'address' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'principal' => 'required',
            'active' => 'required',
        ]);

        try {
            $RaceChallenge->cif = $request->input('cif');
            $RaceChallenge->name = $request->input('name');
            $RaceChallenge->address = $request->input('address');
            $RaceChallenge->principal = $request->input('principal');
            $RaceChallenge->active = $request->input('active');
            
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $RaceChallenge->logo = $imageName;
            }
            
            $RaceChallenge->update();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('RaceChallenge.index')->with('success', 'RaceChallenge updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RaceChallenge $RaceChallenge)
    {
        //
    }
}
