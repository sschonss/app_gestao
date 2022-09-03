<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;

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

        //verifica se o usuario possui acesso a rota
        echo "AutenticacaoMiddleware: " . $metodo_autenticacao . " - " . $perfil . "<br>";

        if ($metodo_autenticacao == "padrao") {
            return response('verifica usuario e senha no banco de dados');
            //return $next($request);
        } else if ($metodo_autenticacao == "oauth") {
             return response('verifica se o usuario possui token valido');
            //return $next($request);
        } else if ($metodo_autenticacao == "ldap") {
            return response('verifica usuario e senha no AD');
            //verifica usuario e senha no AD
            //return $next($request);
        } else {
            return response('Acesso negado');
        }


        if(false) {
            return $next($request);
        }else{
            return Response('Acesso negado! Você não está autenticado');
        }

    }
}
