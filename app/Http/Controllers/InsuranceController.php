<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Http\Requests\StoreInsuranceRequest;
use App\Http\Requests\UpdateInsuranceRequest;
use Illuminate\Http\Request;
use Exception;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insurances = Insurance::all();
        return view('admin.insurances.index', compact('insurances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insurances.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cif' => 'required|string|max:9',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'active' => 'required|boolean'
        ]);

        try {
            $insurance = Insurance::create($validatedData);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('insurance.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insurance $insurance)
    {
        return view('admin.insurances.edit', compact('insurance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $insurance = Insurance::findOrFail($id);

        $request->validate([
            'cif' => 'required',
            'name' => 'required',
            'address' => 'required',
            'price' => 'required',
            'active' => 'required',
        ]);

        try {
            $insurance->cif = $request->input('cif');
            $insurance->name = $request->input('name');
            $insurance->address = $request->input('address');
            $insurance->price = $request->input('price');
            $insurance->active = $request->input('active');
            
            $insurance->update();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('insurance.index')->with('success', 'Insurance updated successfully');
    }
}
