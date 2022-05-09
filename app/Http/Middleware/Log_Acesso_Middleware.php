<?php

namespace App\Http\Middleware;
use App\LogAcesso;

use Closure;

class Log_Acesso_Middleware
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
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip  requisitou a rota $rota "]);

        //return $next($request);

        $resposta = $next($request);
        $resposta->setStatusCode(201,'Mudei o baguio');
        return $resposta;
    }
}
