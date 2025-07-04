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
    
    // Aplicar filtros
    if ($request->filled('nombre')) {
        $query->where('nombre', 'like', '%'.$request->nombre.'%');
    }
    
    if ($request->filled('categoria')) {
        $query->where('categoria', $request->categoria);
    }
    
    if ($request->filled('precio_min')) {
        $query->where('precio', '>=', $request->precio_min);
    }
    
    if ($request->filled('precio_max')) {
        $query->where('precio', '<=', $request->precio_max);
    }
    
    // Ordenamiento
    if ($request->has('sort') && $request->has('direction')) {
        $query->orderBy($request->sort, $request->direction);
    } else {
        $query->orderBy('id', 'asc'); // Orden por defecto
    }
    
    // Obtener categorías para el dropdown
    $categorias = Productos::select('categoria')
                        ->distinct()
                        ->orderBy('categoria')
                        ->pluck('categoria');
    
    // Paginación con conservación de todos los parámetros GET
    $productos = $query->paginate(40)->withQueryString();
    
    return view('productos.index', compact('productos', 'categorias'));
}

    public function create()
    {
        $categorias = Productos::select('categoria')
                            ->distinct()
                            ->orderBy('categoria')
                            ->pluck('categoria');
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
        $categorias = Productos::select('categoria')
                            ->distinct()
                            ->orderBy('categoria')
                            ->pluck('categoria');
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