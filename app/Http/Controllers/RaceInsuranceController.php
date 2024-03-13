<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Insurance;
use App\Models\RaceInsurance;
use App\Http\Requests\StoreRaceInsuranceRequest;
use App\Http\Requests\UpdateRaceInsuranceRequest;
use Illuminate\Http\Request;
use Exception;

class RaceInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Race $race)
    {
        $raceinsurances = $race->insurances()->get();
        if($raceinsurances->count() > 0){
            $noRecord = false;
        } else {
            $noRecord = true;
        }
        return view('admin.raceinsurances.index', compact('raceinsurances', 'race', 'noRecord'));
    }

    public function indexadd(Race $race)
    {
        $raceinsurances = Insurance::whereNotIn('id', function ($query) use ($race) {
            $query->select('insurance')->from('race_insurances')->where('race', $race->id);
        })->get();
        if($raceinsurances->count() > 0){
            $noRecord = false;
        } else {
            $noRecord = true;
        }
        return view('admin.raceinsurances.add', compact('raceinsurances', 'race', 'noRecord'));
    }

    /**
     * Adds a insurance to the desired race
     */
    public function add(Race $race, Insurance $insurance)
    {
        if(!($race->insurances()->where('insurance', $insurance->id)->exists())) {
            $raceinsurance = new RaceInsurance();
            $raceinsurance->race = $race->id;
            $raceinsurance->insurance = $insurance->id;
            $raceinsurance->save();
            return redirect()->back()->with('success', 'Insurance added successfully');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Adds a insurance to the desired race
     */
    public function remove(Race $race, Insurance $insurance)
    {
        $race->insurances()->detach($insurance->id);
        return redirect()->back()->with('success', 'Insurance added successfully');
        
    }
}
