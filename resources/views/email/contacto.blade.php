@extends('layouts.email')

@section('content')
<h2>Nuevo mensaje de contacto</h2>

<p><strong>Nombre:</strong> {{ $contacto['nombre'] }}</p>
<p><strong>Email:</strong> {{ $contacto['email'] }}</p>
<p><strong>Teléfono:</strong> {{ $contacto['telefono'] ?? 'No proporcionado' }}</p>
<p><strong>Asunto:</strong> {{ $contacto['asunto'] }}</p>
<p><strong>Mensaje:</strong></p>
<p>{{ $contacto['mensaje'] }}</p>
@endsection