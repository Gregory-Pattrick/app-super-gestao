<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = ''; 

        if ($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não inválido!';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página!';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        #Criando as regras de validação para o Login
        $regras = [
            'usuario' => 'email',
            'senha'   => 'required'
        ];

        #Definindo as msg de feedback de validações
        $feedback = [
            'usuario.email' => 'O campo (e-mail) é obrigatório',
            'senha.required' => 'O campo (senha) é obrigatório'
        ];

        $request->validate($regras, $feedback);

        #Recuperando os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        #Iniciando a model User
        $user = new User();

        #Verifica se o usuário informado existe no banco de dados
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (!isset($usuario->name)) {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        session_start();
        $_SESSION['nome'] = $usuario->name;
        $_SESSION['email'] = $usuario->email;

        return redirect()->route('app.home');
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
