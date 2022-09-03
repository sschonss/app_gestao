<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAcesso::create(['log' => "O IP " . $ip . " acessou a rota " . $rota]);
        return $next($request);
        //return response('Acesso negado');
        //$resposta = $next($request);
        //$resposta->setStatusCode(201, 'REC');
        //dd($resposta);
    }
}
