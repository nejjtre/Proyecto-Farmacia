<?php

namespace App\Http\Controllers;

use App\Models\producto;

class CatalogoController extends Controller
{
    public function index()
    {
        // Obtener productos con sus categorías
        $productos = productos::with('categoria')->get();
        
        return view('catalogo.index', compact('productos'));
    }
}