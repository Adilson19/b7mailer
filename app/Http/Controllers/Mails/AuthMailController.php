<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthMailController extends Controller
{
    //  Metodo para enviar um email
    //  Aqui faz-se as configuracoes do destinatario
    public function sendRegisterMail(){
        
        $user = new User();
        $user->name = 'Sousa 2000';
        
        //  Criando uma instancia da class mail
        $registerEmail = new RegisterEmail($user);

        //  Simplesmente para teste
        //return $registerEmail;

        //  Usando a class Mail do Laravel para fazer o envio dessa instancio de envio de email
        Mail::to('adilsonsousaas82@gmail.com')
        //  Para enviar uma copia carbono
        ->cc('email@gmail.com')
        ->send($registerEmail);

    }
}
