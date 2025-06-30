@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <h1>Listado de Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Principio Activo</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->codigo_barras }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->principio_activo }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td class="{{ $producto->cantidad_stock < 10 ? 'text-danger fw-bold' : '' }}">
                        {{ $producto->cantidad_stock }}
                    </td>
                    <td>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $productos->links() }}
    </div>
</div>
@endsection