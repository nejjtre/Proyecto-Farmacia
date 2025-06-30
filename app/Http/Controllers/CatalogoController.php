<?php 
// Crear controlador para el catálogo de productos
namespace App\Http\Controllers;

use App\Models\Producto;

class CatalogoController extends Controller
{
    public function index()
    {
        // Obtener productos con sus categorías (eager loading)
        $productos = Producto::with('categoria')->get();
        
        return view('catalogo.index', compact('productos'));
    }
}