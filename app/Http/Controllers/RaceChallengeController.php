<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Challenge;
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
    public function index(Race $race)
    {
        $racechallenges = $race->challenges()->orderBy('position')->get();
        if($racechallenges->count() > 0){
            $noRecord = false;
        } else {
            $noRecord = true;
        }
        return view('admin.racechallenges.index', compact('racechallenges', 'race', 'noRecord'));
    }
    public function indexadd(Race $race)
    {
        $racechallenges = Challenge::whereNotIn('id', function ($query) use ($race) {
            $query->select('challenge')->from('race_challenges')->where('race', $race->id);
        })->get();
        if($racechallenges->count() > 0){
            $noRecord = false;
        } else {
            $noRecord = true;
        }
        return view('admin.racechallenges.add', compact('racechallenges', 'race', 'noRecord'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.racechallenge.new');
    }

    /**
     * Adds a challenge to the desired race
     */
    public function add(Race $race, Challenge $challenge)
    {
        if(!($race->challenges()->where('challenge', $challenge->id)->exists())) {
            $racechallenge = new RaceChallenge();
            $racechallenge->race = $race->id;
            $racechallenge->challenge = $challenge->id;

            $newChallengeDifficulty = $challenge->difficulty;
            $existingChallenges = $race->challenges()->orderBy('position')->get();

            $newChallengePosition = 0;
            foreach ($existingChallenges as $existingChallenge) {
                if ($existingChallenge->difficulty >= $newChallengeDifficulty) {
                    $newChallengePosition++;
                }
            }
            $racechallenge->position = $newChallengePosition;
            $racechallenge->save();

            $existingChallenges = RaceChallenge::where('race', $race->id)->where('position', '>=', $newChallengePosition)->where('id', '!=', $racechallenge->id)->orderBy('position')->get();
            foreach ($existingChallenges as $existingChallenge) {
                $existingChallenge->position += 1;
                $existingChallenge->update();
            }

            return redirect()->back()->with('success', 'Challenge added successfully');
        } else {
            return redirect()->back();
        }
    }
    
    /**
     * Adds a challenge to the desired race
     */
    public function remove(Race $race, Challenge $challenge)
    {
        $raceChallenge = RaceChallenge::where('challenge', $challenge->id)->where('race', $race->id)->get()->first();
        $position = $raceChallenge->position;
        $race->challenges()->detach($challenge->id);
        $existingChallenges = RaceChallenge::where('race', $race->id)->where('position', '>=', $position)->orderBy('position')->get();
        foreach($existingChallenges as $existingChallenge){
            $existingChallenge->position -= 1;
            $existingChallenge->update();
        }

        return redirect()->back()->with('success', 'Challenge added successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $positions = $request->input('positions');
        $race = $request->input('raceid');
        $message = "";
        foreach ($positions as $position) {
            $raceChallenge = RaceChallenge::where('challenge', $position['id'])->where('race', $race)->get()->first();
            if ($raceChallenge) {
                $raceChallenge->position = $position['position'];
                $raceChallenge->update();
                $message .= ":D";
            } else {
                $message .= ":C";
            }
        }

        return response()->json(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RaceChallenge $RaceChallenge)
    {
        //
    }
}
