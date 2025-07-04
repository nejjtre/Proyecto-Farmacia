<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;          
use App\Models\User;
use App\Models\Contacto;

class MiCuentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $contactos = $user->contactos ?? [];
        
        return view('micuenta.index', compact('user', 'contactos'));
    }

    public function agregarContacto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'telefono' => 'required|numeric',
            'direccion' => 'required|max:255',
            'parentesco' => 'required|max:50'
        ]);

        Auth::user()->contactos()->create($request->all());

        return back()->with('success', 'Contacto agregado correctamente');
    }
}