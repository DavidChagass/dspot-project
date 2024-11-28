<?php

namespace App\Providers;  // Define o namespace do provider

use Illuminate\Support\ServiceProvider;  // Importa a classe base para os Service Providers
use Illuminate\Support\Facades\View;  // Importa o facade View para trabalhar com visualizações
use Illuminate\Support\Facades\Auth;  // Importa o facade Auth para lidar com autenticação

class AppServiceProvider extends ServiceProvider  // Define o provedor de serviços principal
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Método para registrar serviços da aplicação, mas aqui está vazio
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());  // Compartilha o usuário autenticado com todas as views
        });
    }
}
