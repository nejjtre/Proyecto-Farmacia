<?php
namespace App\Http\Controllers;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
   public function index(Request $request)
{
    $query = Productos::query();
    
    if ($request->has('categoria')) {
        $query->where('categoria', $request->categoria);
    }
    
    $productos = $query->paginate(10); // Cambia esto (número de items por página)
    
    $categorias = Productos::select('categoria')->distinct()->pluck('categoria');
    
    return view('productos.index', compact('productos', 'categorias'));
}  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable',
            'categoria' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0'
        ]);

        Productos::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }

    public function show(Productos $producto)
    {
        return view('productos.show', compact('producto'));
    }
    public function update(Request $request, Productos $producto)
    {
        $validated = $request->validate([
            'id' => 'required|exists:productos,id',
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable',
            'categoria' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0'
        ]);

        $producto->update($validated);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Productos $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}
