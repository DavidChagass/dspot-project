<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     *
     * Este método realiza o logout do usuário autenticado, invalidando a sessão e regenerando o token CSRF.
     * Ele é chamado quando o usuário deseja sair da aplicação.
     */
    public function __invoke(): void
    {
        // Realiza o logout do usuário usando o guard 'web'
        Auth::guard('web')->logout();

        // Invalida a sessão atual para garantir que os dados da sessão sejam limpos
        Session::invalidate();

        // Regenera o token CSRF para garantir que a sessão atual não seja reutilizada indevidamente
        Session::regenerateToken();
    }
}
