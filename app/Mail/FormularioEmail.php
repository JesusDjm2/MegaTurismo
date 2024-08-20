<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormularioEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $telefono;
    public $email;
    public $fechaViaje;
    public $tour;
    public $cantidadAdultos;
    public $cantidadNinos;
    public $mensaje;
    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $telefono, $email, $fechaViaje, $tour, $cantidadAdultos, $cantidadNinos, $mensaje)
    {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email=$email;
        $this->fechaViaje = $fechaViaje;
        $this->tour = $tour;
        $this->cantidadAdultos = $cantidadAdultos;
        $this->cantidadNinos = $cantidadNinos;
        $this->mensaje = $mensaje;
    }
    public function build()
    {
        return $this->view('emails.tourEmail');
    }

}
