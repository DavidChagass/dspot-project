<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * As pilhas de middleware globais HTTP que executam em cada solicitação.
     *
     * Aqui são definidos os middlewares que serão executados para todas as requisições HTTP. Eles são responsáveis por tarefas comuns, como segurança e manipulação de cookies.
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class, // Middleware para confiar nos proxies, configurando as informações de IP
        \Fruitcake\Cors\HandleCors::class, // Middleware para gerenciar as configurações de CORS (Cross-Origin Resource Sharing)
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class, // Middleware para impedir requisições enquanto o aplicativo está em manutenção
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // Middleware para validar o tamanho das requisições POST
        \App\Http\Middleware\TrimStrings::class, // Middleware para remover espaços em branco dos campos de string da requisição
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // Middleware para converter strings vazias em null
    ];

    /**
     * Middlewares que podem ser atribuídos a grupos de rotas.
     *
     * Aqui definimos grupos de middlewares que são aplicados a diferentes tipos de rotas, como web e api.
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, // Middleware para criptografar os cookies
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Middleware para adicionar cookies enfileirados na resposta
            \Illuminate\Session\Middleware\StartSession::class, // Middleware para iniciar a sessão
            // \Illuminate\Session\Middleware\AuthenticateSession::class, // Middleware para autenticar a sessão (comentado, mas disponível)
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Middleware para compartilhar erros de sessão nas views
            \App\Http\Middleware\VerifyCsrfToken::class, // Middleware para verificar o token CSRF em requisições POST
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Middleware para substituir os parâmetros de rota com valores correspondentes
        ],

        'api' => [
            'throttle:api', // Middleware para limitar o número de requisições feitas à API
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Middleware para substituir os parâmetros de rota com valores correspondentes
        ],

        'gerente' => [
            \App\Http\Middleware\GerenteAutenticado::class, // Middleware personalizado para verificar se o usuário é um gerente autenticado
        ],
    ];

    /**
     * Middlewares de rotas individuais.
     *
     * Aqui são definidos middlewares que podem ser aplicados a rotas específicas.
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Middleware para autenticar o usuário
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class, // Middleware para autenticação com autenticação básica HTTP
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class, // Middleware para definir cabeçalhos de cache
        'can' => \Illuminate\Auth\Middleware\Authorize::class, // Middleware para autorização de acesso baseado em permissões
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // Middleware que redireciona usuários autenticados para o dashboard
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class, // Middleware para exigir confirmação de senha
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class, // Middleware para validar assinaturas de URL
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // Middleware para limitar o número de requisições por IP
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // Middleware para garantir que o email do usuário foi verificado
    ];
}
