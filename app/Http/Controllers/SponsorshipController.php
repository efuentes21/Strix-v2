<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Sponsor;
use App\Models\Company;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Race $race)
    {
        $sponsors = $race->sponsors()->get();
        if($sponsors->count() > 0){
            $noRecord = false;
        } else {
            $noRecord = true;
        }
        return view('admin.sponsorships.index', compact('sponsors', 'race', 'noRecord'));
    }
    public function indexadd(Race $race)
    {
        $sponsors = Sponsor::whereNotIn('id', function ($query) use ($race) {
            $query->select('sponsor')->from('sponsorships')->where('race', $race->id);
        })->get();
        if($sponsors->count() > 0){
            $noRecord = false;
        } else {
            $noRecord = true;
        }
        return view('admin.sponsorships.add', compact('sponsors', 'race', 'noRecord'));
    }

    /**
     * Adds a challenge to the desired race
     */
    public function add(Race $race, Sponsor $sponsor)
    {
        if(!($race->sponsors()->where('sponsor', $sponsor->id)->exists())) {
            $sponsorship = new Sponsorship();
            $sponsorship->race = $race->id;
            $sponsorship->sponsor = $sponsor->id;
            $sponsorship->save();
            return redirect()->back()->with('success', 'Sponsor added successfully');
        } else {
            return redirect()->back();
        }
    }
    
    /**
     * Adds a challenge to the desired race
     */
    public function remove(Race $race, Sponsor $sponsor)
    {
        $race->sponsors()->detach($sponsor->id);
        return redirect()->back()->with('success', 'Sponsor added successfully');
    }

    /**
     * Prints a PDF containing all the competitors inscripted in a race
     */
    public function print(Sponsor $sponsor){
        $company = Company::findOrFail('1');
        $races = $sponsor->races;
        return view('admin.sponsorships.pdf', compact(['sponsor', 'races', 'company']));
    }
}
