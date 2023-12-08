<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionJurado extends Mailable
{
    use Queueable, SerializesModels;
    public $jurado;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jurado)
    {
        $this->jurado = $jurado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notificacion_jurado')
                    ->with(['jurado' => $this->jurado])
                    ->subject('Seleccion de jurado'); // Asigna un asunto adecuado
    }
}
