<?php
namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;

class ProductosController extends Controller
{
    public function index(Request $request)
    {
        $query = Productos::query();
        
        // Filtro por nombre
        if ($request->has('nombre') && !empty($request->nombre)) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }
        
        // Filtro por categoría
        if ($request->has('categoria') && !empty($request->categoria)) {
            $query->where('categoria', $request->categoria);
        }
        
        // Filtro por precio mínimo
        if ($request->has('precio_min') && !empty($request->precio_min)) {
            $query->where('precio', '>=', $request->precio_min);
        }
        
        // Filtro por precio máximo
        if ($request->has('precio_max') && !empty($request->precio_max)) {
            $query->where('precio', '<=', $request->precio_max);
        }
        
        // Obtener categorías únicas para el dropdown
        $categorias = Productos::select('categoria')->distinct()->pluck('categoria');
        
        // Paginación con 10 items por página y conservar los parámetros de búsqueda
        $productos = $query->sortable()->paginate(40)->appends($request->except('page'));
        
        return view('productos.index', compact('productos', 'categorias'));
    }

    public function create()
    {
        $categorias = Productos::select('categoria')->distinct()->pluck('categoria');
        return view('productos.create', compact('categorias'));
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

    public function edit(Productos $producto)
    {
        $categorias = Productos::select('categoria')->distinct()->pluck('categoria');
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Productos $producto)
    {
        $validated = $request->validate([
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
