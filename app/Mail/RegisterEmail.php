<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;



class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     // Enviando com Injeção de Dependência

     // Criamos a class diretamente no Contructor User
    public function __construct(User $qualquernome)
    {
        //
        $this->user = $qualquernome;
    }

    public function build()
    {
        
        //  
        return $this->view('Mail.registerMail', [
            'nome' => $this->user->name
        ]);
    }

}
