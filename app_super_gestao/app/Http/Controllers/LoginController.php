<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senhas inválidos';
        }
        if($request->get('erro') == 2){
            $erro = 'Necessario realizar login para acessar a page';
        }
        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request){
        //regras de validaca
        $regras = [
            'usuario' =>'email',
            'senha' => 'required'
        ];

        //as msg de feed de validacao
        $feedback = [
            'usuario.email' =>'O campo usuário é obrigatório',
            'senha.required' => 'O campo senha é obrigatorio'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $pass = $request->get('senha');

        //iniciar o Model Users
        $usr = new User();
        $sql = $usr->where('email', $email)
            ->where('password', $pass)
            ->get()
            ->first();
        if(isset($sql->name))  {
            session_start();
            $_SESSION['nome'] = $sql->name;
            $_SESSION['email'] = $sql->email;

            return redirect()->route('app.home');
        } else{
           return redirect()->route('site.login', ['erro' => 1]);
        } 
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
