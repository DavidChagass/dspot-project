<!-- resources/views/layouts/auth-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="w-fit h-fit flex justify-center font-sans">
    <div class="flex justify-center min-h-screen bg-gray-100">
        <main>
        <!--Adicionar o tipo de login ao layout em um h1 ou h2-->
            {{ $slot }} <!--Pegar o layout automático para poder padronizar o formulário-->
        </main>
    </div>
    @livewireScripts
</body>
</html>
