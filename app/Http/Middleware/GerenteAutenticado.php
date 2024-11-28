<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GerenteAutenticado
{
    /**
     * Handle an incoming request.
     *
     * Verifica se o usuário está autenticado com o guard 'gerente'. Caso contrário, redireciona para a página de login.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado usando o guard 'gerente'
        if (!Auth::guard('gerente')->check()) {
            // Se não estiver autenticado, redireciona para a página de login do gerente
            return redirect()->route('login.gerente');
        }

        // Se o usuário estiver autenticado, permite que a requisição continue
        return $next($request);
    }
}
