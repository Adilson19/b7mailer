<?php

namespace App\Jobs;

use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAuthMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {

        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         //  Criando uma instancia da class mail
         $registerEmail = new RegisterEmail($this->user);

         //  Simplesmente para teste
         //return $registerEmail;
 
         //  Usando a class Mail do Laravel para fazer o envio dessa instancio de envio de email
         Mail::to('adilsonsousaas82@gmail.com')
         //  Para enviar uma copia carbono
         ->cc('email@gmail.com')
         ->bcc('email2@gmail.com')
         //     Dentro do job ja nao vamos criar a queue mas sim enviar o email
         ->send($registerEmail);
    }
}
