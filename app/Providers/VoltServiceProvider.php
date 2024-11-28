<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;  // Importa a classe base para os Service Providers
use Livewire\Volt\Volt;  // Importa o facade Volt para trabalhar com Livewire Volt

class VoltServiceProvider extends ServiceProvider  // Define o provedor de serviços VoltServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Método vazio para registrar serviços, se necessário
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Volt::mount([  // Configura o caminho das views para o Livewire Volt
            config('livewire.view_path', resource_path('views/livewire')),  // Caminho configurável para views do Livewire
            resource_path('views/pages'),  // Caminho adicional para as views
        ]);
    }
}
