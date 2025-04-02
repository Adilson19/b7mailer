<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use App\Models\User;
use App\Jobs\SendAuthMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthMailController extends Controller
{
    //  Metodo para enviar um email
    //  Aqui faz-se as configuracoes do destinatario
    public function sendRegisterMail(){
        
        //  Inicialiazando o Objeto
        $user = new User();

        //  Dados Do usuario
        $user->name = 'Sousa 2000';
        $user->password = '123';
        $user->email = 'teste21999@teste.com';

        //  Salvando os dados no Banco de Dados
        $user->save();

        SendAuthMail::dispatch($user);

    }
}
