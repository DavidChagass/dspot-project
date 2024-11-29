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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Incluindo ícones do font-awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Incluindo o JS do Bootstrap (necessário para interatividade como dropdowns e modais) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Script para funcionalidades de navegação de histórico (voltar para a página anterior) -->
    <script defer src="{{ asset('js/historyBack.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

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
                    <div class="hidden sm:ml-6 sm:block">
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
                <div class="pointer inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" id="btn-dropdown" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden sm:hidden" id="dropdown">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <div class="flex justify-start items-center">
                    <img class="inline-block size-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Foto do usuário">
                    <p class="text-white text-lg p-2">Bem-vindo! <strong class="capitalize">{{ $user->nome }}</strong></p>
                </div>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 bg-gray-900">Início</a>
                <a href="{{ route('empresa.register') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"><i class="fa-solid fa-building text-white group-hover:text-indigo-600"></i> Empresa</a>
                <a href="{{ route('gerente-register') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"><i class="fa-solid fa-user-gear text-white group-hover:text-indigo-600"></i> Gerente</a>
                <a href="{{ route('funcionario-register') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"><i class="fa-solid fa-user text-white group-hover:text-indigo-600"></i> Funcionário</a>
                <a href="#" id="exitButton" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Contêiner principal da página -->
    <div>
        <div>
            <!-- Área principal onde o conteúdo dinâmico será inserido via Livewire -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Inclusão dos scripts do Livewire -->
    @livewireScripts
</body>

</html>