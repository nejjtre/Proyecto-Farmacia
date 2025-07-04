@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Contacta con Farmacia Salud Rápida</h2>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contacto.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre completo *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                    required maxlength="100" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                    required value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" 
                                value="{{ old('telefono') }}">
                            @error('telefono')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="asunto" class="form-label">Asunto *</label>
                            <input type="text" class="form-control" id="asunto" name="asunto" 
                                required maxlength="100" value="{{ old('asunto') }}">
                            @error('asunto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje *</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" 
                                    rows="5" required maxlength="500">{{ old('mensaje') }}</textarea>
                            @error('mensaje')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i> Enviar Mensaje
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-light">
                    <div class="row">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <h5><i class="fas fa-map-marker-alt text-primary me-2"></i> Dirección</h5>
                            <p>Calle Farmacia, 123<br>Ciudad Salud, CP 28000</p>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <h5><i class="fas fa-phone-alt text-primary me-2"></i> Teléfono</h5>
                            <p>+34 912 345 678<br>Lun-Vie: 9:00-21:00</p>
                        </div>
                        <div class="col-md-4">
                            <h5><i class="fas fa-envelope text-primary me-2"></i> Email</h5>
                            <p>info@farmaciasaludrapida.com<br>contacto@farmaciasaludrapida.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection