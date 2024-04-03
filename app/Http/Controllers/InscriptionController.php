<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insurance;
use App\Models\Race;
use App\Models\Competitor;
use App\Models\Inscription;

class InscriptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($raceId)
    {
        $race = Race::findOrFail($raceId);
        $insurances = Insurance::all();
        return view('user.inscriptions.index', compact('race', 'insurances'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $raceId)
    {
        $validatedData = $request->validate([
            'dni' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birthdate' => 'required|date',
            // 'email' => 'required|string|max:255',
            'sex' => 'required',
            'insurance' => 'required',
        ]);

        try {
            $competitor = Competitor::create([
                'dni' => $validatedData['dni'],
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'birthdate' => $validatedData['birthdate'],
                'sex' => $validatedData['sex'],
                'pro' => false,
                'points' => 0,
                'partner' => false,
                'active' => true,
                'email' => '',
                'password' => '',
            ]);

            $inscription = [
                'race' => $raceId,
                'competitor' => $competitor->id,
                'number' => 1,
                'arrival' => null,
                'insurance' => $validatedData['insurance'],
            ];

            Inscription::create($inscription);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('/')->with('success', 'Race successfully created!');
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
