<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Race;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admins.login');
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
	    if (Auth::guard('admin')->attempt($credentials)) {
	        return redirect()->route('race.index')->withSuccess('Logged in successfully');
	    }
	
	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect()->route('admin.index')->withSuccess('Los datos introducidos no son correctos');
    }

	public function logout(Request $request) {
		Auth::guard('admin')->logout();

		$request->session()->invalidate();

		// $request->session()->regenerateToken();

		return redirect()->route('admin.index')->withSuccess('Logged out successfully');
	}

}
