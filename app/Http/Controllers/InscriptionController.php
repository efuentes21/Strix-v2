<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $insurances = $race->insurances;
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
            'birthdate' => 'required|date',
            'email' => 'required|string|max:255',
            'sex' => 'required',
            'pro' => 'required',
            'insurance' => 'required',
        ]);

        $competitorExist = Competitor::where('dni', $validatedData['dni'])->first();

        try {
            if($competitorExist) {
                $competitorExist->name = $validatedData['name'];
                $competitorExist->email = $validatedData['email'];
                $competitorExist->birthdate = $validatedData['birthdate'];
                $competitorExist->sex = $validatedData['sex'];
                $competitorExist->pro = $validatedData['pro'];

                $competitorExist->update();

                $idCompetitor = $competitorExist->id;
            } else {
                $competitor = Competitor::create([
                    'dni' => $validatedData['dni'],
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'birthdate' => $validatedData['birthdate'],
                    'sex' => $validatedData['sex'],
                    'pro' => $validatedData['pro'],
                    'points' => 0,
                    'partner' => false,
                    'active' => true,
                    'address' => '',
                    'password' => '',
                ]);

                $idCompetitor = $competitor->id;
            }

            $inscription = [
                'race' => $raceId,
                'competitor' => $idCompetitor,
                'number' => 1,
                'arrival' => null,
                'insurance' => $validatedData['insurance'],
            ];

            Inscription::create($inscription);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('/')->with('success', 'Inscription successfully created!');
    }

    /**
     * Prints a PDF containing all the competitors inscripted in a race
     */
    public function print(Race $race){
        //$inscriptions = Inscription::with('competitor')->where('race', $race)->get();
        $inscriptions = Inscription::where('race', $race->id)->with('competitors')->orderBy('competitor')->get();
        return view('admin.inscriptions.pdf', compact(['inscriptions', 'race']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storelogged($raceId)
    {
        try {
            $inscription = [
                'race' => $raceId,
                'competitor' => Auth::guard('competitor')->user()->id,
                'number' => 1,
                'arrival' => null,
                'insurance' => 1,
            ];

            Inscription::create($inscription);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('/')->with('success', 'Inscription successfully created!');
    }
}
