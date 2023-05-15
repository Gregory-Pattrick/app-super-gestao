<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        session_start();

        #Caso não esteja logado retorna o erro de acesso negado.
        if (!isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return redirect()->route('site.login', ['erro' => 2]);
        }

        #Se o usuário estiver logado segue para rota
        return $next($request);


        
    }
}
