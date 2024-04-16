<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::all();
        return view('admin.challenges.index', compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.challenges.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChallengeRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'difficulty' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'required|boolean'
        ]);

        try {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
            Challenge::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('challenge.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        return view('admin.challenges.edit', compact('challenge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChallengeRequest $request, String $id)
    {
        $challenge = Challenge::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'difficulty' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'required|boolean'
        ]);

        try {
            $challenge->name = $request->name;
            $challenge->description = $request->description;
            $challenge->difficulty = $request->difficulty;
            $challenge->active = $request->active;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $challenge->image = $imageName;
            }
            $challenge->update();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('challenge.index');
    }

    /**
     * Shows the challenges client page
     */
    public function challengespage()
    {
        $challenges = Challenge::where('active', true)->get();
        return view('user.mainpage.challenges', compact('challenges'));
    }
}
