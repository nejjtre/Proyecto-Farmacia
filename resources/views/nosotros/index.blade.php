@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 text-center mb-5">Sobre Nuestra Farmacia en Línea</h1>
            
            <div class="card shadow-sm mb-5">
                <div class="card-body p-5">
                    <h2 class="h3 mb-4">Nuestra Historia</h2>
                    <p class="lead">En <strong>Farmacia Salud Rápida</strong>, comenzamos en 2025 con la visión de revolucionar el acceso a medicamentos y productos de salud en nuestra comunidad.</p>
                    <p>Lo que empezó como una pequeña farmacia local se ha transformado en una plataforma digital completa que sirve a miles de clientes en todo el país.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="h4"><i class="fas fa-bullseye me-2 text-primary"></i>Nuestra Misión</h3>
                            <p>Proporcionar acceso rápido, seguro y confiable a medicamentos y productos de salud, con un servicio personalizado y profesional.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="h4"><i class="fas fa-eye me-2 text-primary"></i>Nuestra Visión</h3>
                            <p>Ser la farmacia en línea líder en innovación y calidad de servicio, expandiendo nuestro alcance para beneficiar a más comunidades.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-body p-5">
                    <h2 class="h3 mb-4">Nuestro Equipo</h2>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="text-center">
                                <img src="https://sistemas.com/termino/wp-content/uploads/Usuario-Icono.jpg" width="75%" class="rounded-circle mb-3" alt="Atención">
                                <h4 class="h5">Dueñas Herrada Alexander</h4>
                                <p class="text-muted">Gerente general</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-body p-5">
                    <h2 class="h3 mb-4">Por Qué Elegirnos</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Entrega rápida en 24-48 horas</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Asesoramiento farmacéutico profesional</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Precios competitivos y descuentos frecuentes</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Plataforma segura y fácil de usar</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Atención al cliente 24/7</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection