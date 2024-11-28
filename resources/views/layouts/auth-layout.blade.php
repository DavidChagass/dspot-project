<!-- resources/views/layouts/auth-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definindo o conjunto de caracteres para UTF-8 -->
    <meta charset="UTF-8">
    <!-- Definindo a viewport para responsividade em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título da página -->
    <title>Dspot - O melhor lugar para o seu estoque</title>
    
    <!-- Link para o CSS do Bootstrap (framework para design responsivo) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Link para o JS do Bootstrap (necessário para funcionalidades interativas, como menus suspensos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Link para o CSS personalizado (estilos específicos para o formulário) -->
    <link rel="stylesheet" href="{{ asset('css/form.style.css') }}">
    
    <!-- Link para o CSS com utilitários adicionais de estilo -->
    <link rel="stylesheet" href="{{ asset('css/form.utilities.css') }}">

    <!-- Scripts para as máscaras de entrada de dados (domínio e telefone) -->
    <script defer src="{{ asset('js/mascaras/mask.dominio.js') }}"></script>
    <script defer src="{{ asset('js/mascaras/mask.telefone.js') }}"></script>

    <!-- Script para funcionalidades utilitárias do formulário -->
    <script defer src="{{ asset('js/form.utilities.js') }}"></script>

    <!-- Script para o controle de navegação de histórico (voltar para a página anterior) -->
    <script defer src="{{ asset('js/historyBack.js') }}"></script>

    <!-- Link para o Tailwind CSS (framework CSS utilitário para design customizável) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Inclusão de arquivos CSS e JS com Vite (para gerenciamento de assets no Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Inclusão dos estilos específicos do Livewire -->
    @livewireStyles

</head>

<body class="overflow-x-hidden">
    <!-- Barra de navegação com fundo escuro -->
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-between sm:items-stretch">
                    <div class="flex flex-shrink-0 items-center">
                        <!-- Logo da empresa -->
                        <img class="h-8 w-auto" src="{{ asset('/src/Group 4 (1).png' )}}" alt="Your Company">
                    </div>
                    <div class="sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Botão de logout com o ID 'dynamicButton' -->
                            <a href="#" id="dynamicButton" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contêiner principal do layout -->
    <div class="container container-fluid">
        <div class="flex justify-center min-h-screen">
            <!-- Área principal de conteúdo (o conteúdo é inserido aqui com o slot do Laravel) -->
            <main class="flex items-center container-sm justify-center">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Inclusão dos scripts do Livewire -->
    @livewireScripts
</body>

</html>
