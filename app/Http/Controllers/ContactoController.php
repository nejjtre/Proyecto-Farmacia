<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMailable;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'email' => 'required|email',
            'telefono' => 'nullable|numeric',
            'asunto' => 'required|max:100',
            'mensaje' => 'required|max:500'
        ]);

        // Envía el correo (configurar Mailtrap o servicio de correo primero)
        Mail::to('contacto@farmaciasaludrapida.com')->send(
            new ContactoMailable($request->all())
        );

        return redirect()->route('contacto.index')
            ->with('success', 'Mensaje enviado correctamente. Nos pondremos en contacto pronto.');
    }
}