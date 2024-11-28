<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Definindo o conjunto de caracteres para UTF-8 -->
        <meta charset="utf-8">
        <!-- Configurando a responsividade da página para dispositivos móveis -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Token CSRF para proteger contra ataques CSRF (Cross-Site Request Forgery) -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Título da página, ou nome da aplicação -->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Links para fontes externas -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <!-- Importando a fonte 'Figtree' do Google Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Inclusão dos arquivos CSS e JS via Vite (para otimização de assets) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Div principal que organiza o layout da página -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <!-- Logo da aplicação, com link para a página inicial -->
                <a href="/" wire:navigate>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <!-- Caixa de conteúdo onde o slot dinâmico será inserido -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
