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

    //  Aqui faz-se as configuracoes da mensagem
    public function build()
    {
        //  Definindo o Assunto do Email
        $this->subject('Assunto do Email');

        //  O email deve ser respondido || 
        $this->from('reply@email.com', 'Reply Bot');

        //  Colocamos no sentido de quando ele receber o email a resposta irah chegar no outro email
        $this->replyTo('adilsonsousaas82@gmail.com');
        
        //  
        return $this->view('Mail.registerMail', [
            'nome' => $this->user->name
        ])->attach(__DIR__.'/../../public\boneco.jpg', [
            'as'=>'404.jpg'
        ]);
    }

}
