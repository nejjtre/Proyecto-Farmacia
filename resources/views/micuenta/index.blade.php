@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Mi Cuenta</h2>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <h4>Información Personal</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Mis Contactos</h4>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#agregarContactoModal">
                                <i class="fas fa-plus"></i> Agregar Contacto
                            </button>
                        </div>

                        @if($contactos->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Parentesco</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contactos as $contacto)
                                        <tr>
                                            <td>{{ $contacto->nombre }}</td>
                                            <td>{{ $contacto->telefono }}</td>
                                            <td>{{ $contacto->parentesco }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" 
                                                        data-bs-target="#verContactoModal" 
                                                        data-nombre="{{ $contacto->nombre }}"
                                                        data-telefono="{{ $contacto->telefono }}"
                                                        data-direccion="{{ $contacto->direccion }}"
                                                        data-parentesco="{{ $contacto->parentesco }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No tienes contactos registrados.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar contacto -->
<div class="modal fade" id="agregarContactoModal" tabindex="-1" aria-labelledby="agregarContactoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('agregar-contacto') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarContactoModalLabel">Agregar Nuevo Contacto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono *</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección *</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="parentesco" class="form-label">Parentesco *</label>
                        <select class="form-select" id="parentesco" name="parentesco" required>
                            <option value="">Seleccionar...</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Amigo">Amigo</option>
                            <option value="Vecino">Vecino</option>
                            <option value="Tutor">Tutor</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Contacto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para ver contacto -->
<div class="modal fade" id="verContactoModal" tabindex="-1" aria-labelledby="verContactoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verContactoModalLabel">Detalles del Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> <span id="contactoNombre"></span></p>
                <p><strong>Teléfono:</strong> <span id="contactoTelefono"></span></p>
                <p><strong>Dirección:</strong> <span id="contactoDireccion"></span></p>
                <p><strong>Parentesco:</strong> <span id="contactoParentesco"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Script para mostrar detalles del contacto en el modal
    document.addEventListener('DOMContentLoaded', function() {
        var verContactoModal = document.getElementById('verContactoModal');
        verContactoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            
            document.getElementById('contactoNombre').textContent = button.getAttribute('data-nombre');
            document.getElementById('contactoTelefono').textContent = button.getAttribute('data-telefono');
            document.getElementById('contactoDireccion').textContent = button.getAttribute('data-direccion');
            document.getElementById('contactoParentesco').textContent = button.getAttribute('data-parentesco');
        });
    });
</script>
@endsection
@endsection