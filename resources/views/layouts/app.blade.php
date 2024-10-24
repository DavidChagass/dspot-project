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

    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>

    </footer>

    @livewireScripts
</body>
</html>
