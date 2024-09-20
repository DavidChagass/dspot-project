<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seu Título')</title>
    @livewireStyles
</head>
<body>
    <header>
        <!-- Seu cabeçalho aqui -->
    </header>

    <main>
        {{ $slot }} <!-- Aqui será injetado o conteúdo do componente -->
    </main>

    <footer>
        <!-- Seu rodapé aqui -->
    </footer>

    @livewireScripts
</body>
</html>
