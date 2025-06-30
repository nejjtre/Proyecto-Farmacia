<?php
namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::with('categoria')->orderBy('nombre')->paginate(10);
        
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable',
            'principio_activo' => 'required|max:100',
            'laboratorio' => 'required|max:100',
            'codigo_barras' => 'required|unique:productos',
            'precio' => 'required|numeric|min:0',
            'cantidad_stock' => 'required|integer|min:0',
            'requiere_receta' => 'boolean',
            'fecha_vencimiento' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id'
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
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Productos $producto)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable',
            'principio_activo' => 'required|max:100',
            'laboratorio' => 'required|max:100',
            'codigo_barras' => 'required|unique:productos,codigo_barras,'.$producto->id,
            'precio' => 'required|numeric|min:0',
            'cantidad_stock' => 'required|integer|min:0',
            'requiere_receta' => 'boolean',
            'fecha_vencimiento' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id'
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