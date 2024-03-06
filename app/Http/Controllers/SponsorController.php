<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use Illuminate\Http\Request;
use Exception;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sponsors.new');
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
            $sponsor = Sponsor::create($validatedData);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('sponsor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        $request->validate([
            'cif' => 'required',
            'name' => 'required',
            'address' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'principal' => 'required',
            'active' => 'required',
        ]);

        try {
            $sponsor->cif = $request->input('cif');
            $sponsor->name = $request->input('name');
            $sponsor->address = $request->input('address');
            $sponsor->principal = $request->input('principal');
            $sponsor->active = $request->input('active');
            
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $sponsor->logo = $imageName;
            }
            
            $sponsor->update();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('sponsor.index')->with('success', 'Sponsor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}
