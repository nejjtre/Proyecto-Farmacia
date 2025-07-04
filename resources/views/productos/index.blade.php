@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Columna izquierda para filtros flotantes -->
        <div class="col-md-3 mb-4">
            <div class="card sticky-top" style="top: 20px; z-index: 1020;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Filtrar Productos</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('productos.index') }}" method="GET">
                        <!-- Filtro por nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label> 
                            <input type="text" class="form-control" id="nombre" name="nombre" 
                                value="{{ request('nombre') }}" placeholder="Buscar por nombre">
                        </div>
                        
                        <!-- Filtro por categoría -->
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select class="form-select" id="categoria" name="categoria">
                                <option value="">Todas las categorías</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria }}" 
                                        {{ request('categoria') == $categoria ? 'selected' : '' }}>
                                        {{ $categoria }}
                                    </option>
                                @endforeach 
                            </select>
                        </div>
                        
                        <!-- Filtro por rango de precios -->
                        <div class="mb-3">
                            <label class="form-label">Rango de precios</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" placeholder="Mínimo"
                                    name="precio_min" value="{{ request('precio_min') }}" step="0.01">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" placeholder="Máximo" 
                                    name="precio_max" value="{{ request('precio_max') }}" step="0.01">
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter"></i> Aplicar Filtros
                            </button>
                            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Limpiar Filtros
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Columna derecha para la tabla de productos -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between mb-4">
                <h1>Listado de Productos</h1>
                @auth
                    <a href="{{ route('productos.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nuevo Producto
                    </a>
                @endauth
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if($productos->isEmpty())
                <div class="alert alert-info">
                    No se encontraron productos con los filtros aplicados.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>@sortablelink('id', 'ID')</th>
                                <th>@sortablelink('nombre', 'Nombre')</th>
                                <th>@sortablelink('descripcion', 'Descripción')</th>
                                <th>@sortablelink('categoria', 'Categoría')</th>
                                <th>@sortablelink('precio', 'Precio ($)')</th>
                                <th>@sortablelink('cantidad', 'Stock')</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td>{{ $producto->id }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ Str::limit($producto->descripcion, 50) }}</td>
                                    <td>{{ $producto->categoria }}</td>
                                    <td>${{ number_format($producto->precio, 2) }}</td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success" onclick="alert('Producto agregado al carrito')"
                                            title="Agregar al carrito">
                                            <i class="fas fa-cart-plus"></i> Agregar compra 
                                            <img src="https://cdn-icons-png.flaticon.com/512/9284/9284424.png" width="35lem">
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $productos->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
    
    <footer class="mt-5">
        <p>© 2025 Farmacia Salud Rápida. Todos los derechos reservados.</p>
        <p>Horario: Lunes a Viernes 8:00 - 20:00 | Sábados 9:00 - 14:00</p>
        <div class="footer-links">
            <a href="#">Política de privacidad</a>
            <a href="#">Términos de servicio</a>
            <a href="#">Contacto</a>
        </div>
    </footer>
</div>

<style>
    .sticky-top {
        position: -webkit-sticky;
        position: sticky;
        top: 80px;
        z-index: 1020;
    }
    
    @media (max-width: 768px) {
        .sticky-top {
            position: static;
        }
    }
    
    .table th {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        max-width: 200px;
        text-align: center;
    }
    
    footer {
        text-align: center;
        padding: 20px;
        margin-top: 40px;
        color: #666;
        font-size: 14px;
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
    }
    
    .footer-links a {
        margin: 0 10px;
        color: #007bff;
        text-decoration: none;
    }
    
    .footer-links a:hover {
        text-decoration: underline;
    }
</style>
@endsection