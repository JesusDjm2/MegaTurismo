<?php

namespace App\Http\Controllers;

use App\Mail\FormularioEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function tourEmail(Request $request)
    {
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $fechaViaje = $request->input('fechaViaje');
        $tour = $request->input('tour');
        $cantidadAdultos = $request->input('cantidadAdultos');
        $cantidadNinos = $request->input('cantidadNinos');
        $mensaje = $request->input('mensaje');
        $formularioEmail = new FormularioEmail($nombre, $telefono, $email, $fechaViaje, $tour, $cantidadAdultos, $cantidadNinos, $mensaje);
        Mail::to('mirandadjmdjm@gmail.com')
        ->send($formularioEmail->from($email));
        return redirect()->back()->with('success', 'El formulario ha sido enviado correctamente.');
    }
}