<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * Verifica se o usuário está autenticado. Caso esteja, redireciona para a página de dashboard apropriada.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Verifica se o usuário está autenticado com o guard especificado
        if (Auth::guard($guard)->check()) {
            // Se o guard for 'funcionario', redireciona para o dashboard do funcionário
            if ($guard === 'funcionario') {
                return redirect('/funcionario/dashboard');
            }

            // Caso contrário, redireciona para o dashboard principal
            return redirect('/dashboard');
        }

        // Se o usuário não estiver autenticado, permite que a requisição continue
        return $next($request);
    }
}
