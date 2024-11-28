<!-- resources/views/layouts/auth-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definindo o conjunto de caracteres para UTF-8 -->
    <meta charset="UTF-8">
    <!-- Configurando a responsividade da página para dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título da página -->
    <title>Dspot - O melhor lugar para o seu estoque</title>
    
    <!-- Incluindo o CSS do Bootstrap (framework popular para responsividade e componentes) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Incluindo o JS do Bootstrap (necessário para interatividade como dropdowns e modais) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Script para funcionalidades de navegação de histórico (voltar para a página anterior) -->
    <script defer src="{{ asset('js/historyBack.js') }}"></script>

    <!-- Script para utilitários do dashboard (funcionalidades específicas da página principal) -->
    <script defer src="{{ asset('js/dashboard.utilities.js') }}"></script>

    <!-- Incluindo o Tailwind CSS (framework CSS de utilitários para design customizável e rápido) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Inclusão dos arquivos CSS e JS gerenciados pelo Vite (para otimização de assets no Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos específicos do Livewire para funcionalidades dinâmicas -->
    @livewireStyles

</head>

<body class="overflow-x-hidden">
    <!-- Barra de navegação principal -->
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-between sm:items-stretch">
                    <div class="flex flex-shrink-0 items-center">
                        <!-- Logo da empresa -->
                        <img class="h-8 w-auto" src="{{ asset('/src/Group 4 (1).png' )}}" alt="Your Company">
                    </div>
                    <div class="sm:ml-6 sm:block">
                        <div class="flex space-x-4 items-center">
                            <!-- Exibição da foto do perfil e saudação ao usuário logado -->
                            <div class="grid justify-items-end items-center grid-cols-2 gap-x-2.5">
                                <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Foto do usuário">
                                <p class="text-white">Bem-vindo!<br><strong class="capitalize">{{ $user->nome }}</strong></p>
                            </div>
                            <!-- Link de navegação para a página inicial -->
                            <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Início</a>
                            <!-- Botão de logout com id dinâmico -->
                            <a href="#" id="dynamicButton" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" aria-current="page">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contêiner principal da página -->
    <div class="container container-fluid">
        <div class="flex justify-center min-h-screen">
            <!-- Área principal onde o conteúdo dinâmico será inserido via Livewire -->
            <main class="container mx-auto p-1.5">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Inclusão dos scripts do Livewire -->
    @livewireScripts
</body>

</html>
