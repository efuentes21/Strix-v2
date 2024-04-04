<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Competitor;
use App\Models\Race;
use App\Models\Sponsor;
use App\Models\Inscription;
use App\Http\Requests\StoreCompetitorRequest;
use App\Http\Requests\UpdateCompetitorRequest;

class CompetitorController extends Controller
{
    public function mainpage()
    {
        $races = Race::where('date', '>=', Carbon::today())
                        ->where('active', true)
                        ->orderBy('date')
                        ->take(4)
                        ->get();
        $sponsors = Sponsor::where('principal', true)->where('active', true)->take(8)->get();
        $seemore = true;
        return view('user.mainpage.main', compact((['races', 'sponsors', 'seemore'])));
    }

    /**
     * Display a listing of the resource.
     */
    public function adminindex()
    {
        $competitors = Competitor::all();
        return view('admin.competitors.index', compact('competitors'));
    }

    public function index()
    {
        return view('user.users.login');
    }

    public function login(Request $request) {
        // Comprobamos que el email y la contraseña han sido introducidos
	    $request->validate([
	        'email' => 'required',
	        'password' => 'required',
	    ]);
	
	    // Almacenamos las credenciales de email y contraseña
	    $credentials = $request->only('email', 'password');
	
	    // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
	    if (Auth::guard('competitor')->attempt($credentials)) {
            $user = Auth::guard('competitor')->user();
	        if ($user->partner && $user->active) {
                return redirect()->route('/')->withSuccess('Logged in successfully');
            } else {
                Auth::guard('competitor')->logout();
                return redirect()->back()->with('error', 'Your account is not active or you are not registered. If this is an error, please contact with an administrator');
            }
	    }
	
	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect()->back()->with('error', 'Invalid credentials');
    }

	public function logout(Request $request) {
		Auth::guard('competitor')->logout();

		$request->session()->invalidate();

		// $request->session()->regenerateToken();

		return redirect()->route('competitor.index')->withSuccess('Logged out successfully');
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.users.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dni' => 'required|string|max:9',
            'address' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'sex' => 'required|boolean',
            'federation' => 'nullable|string|max:255',
        ]);

        try {
            $competitorExist = Competitor::where('dni', $validatedData['dni'])->first();
            if($validatedData['federation'] != null){
                $federation = $validatedData['federation'];
                $pro = true;
            } else {
                $federation = null;
                $pro = false;
            }
            if($competitorExist) {
                $competitorExist->name = $validatedData['name'];
                $competitorExist->address = $validatedData['address'];
                $competitorExist->email = $validatedData['email'];
                $competitorExist->password = bcrypt($validatedData['password']);
                $competitorExist->birthdate = $validatedData['birthdate'];
                $competitorExist->sex = $validatedData['sex'];
                $competitorExist->federation = $federation;
                $competitorExist->pro = $pro;
                $competitorExist->partner = true;
                $competitorExist->active = true;
                $competitorExist->update();
            } else {
                $validatedData['partner'] = 1;
                $validatedData['active'] = 1;
                $validatedData['pro'] = $pro;
                $validatedData['password'] = bcrypt($validatedData['password']);
                $validatedData['points'] = 0;
                $validatedData['federation'] = $federation;
                Competitor::create($validatedData);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('user.index')->with('success', 'Inscription successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competitor $competitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competitor $competitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompetitorRequest $request, Competitor $competitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competitor $competitor)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function inscription()
    {
        return view('user.inscriptions.index');
    }
}
