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
}
