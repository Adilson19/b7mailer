<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthMailController extends Controller
{
    //  Metodo para enviar um email
    public function sendRegisterMail(){
        //  Criando uma instancia da class mail
        $registerEmail = new RegisterEmail();

        //  Simplesmente para teste
        return $registerEmail;

        //  Usando a class Mail do Laravel para fazer o envio dessa instancio de envio de email
        //Mail::to('adilsonsousaas82@gmail.com')->send($registerEmail);

    }
}
