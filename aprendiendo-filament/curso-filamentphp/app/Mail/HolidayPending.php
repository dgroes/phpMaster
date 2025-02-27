<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/* C19: Envio de correo */
class HolidayPending extends Mailable
{
    use Queueable, SerializesModels;

    //establecer la variable data para enviar los datos al correo.
    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        //Establecer los datos a enviar.
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */


    //Establecer el asunto del correo.
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Holiday Employee Pending',
        );
    }

    /**
     * Get the message content definition.
     */


    //Establecer la vista en la cual configuraremos el cuerpo del correo.
    public function content(): Content
    {
        //Establecer la vista en la cual configuraremos el cuerpo del correo.
        return new Content(
            view: 'mails.holidayPending',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */

    //Establecer los archivos adjuntos del correo.
    public function attachments(): array
    {
        return [];
    }
}
