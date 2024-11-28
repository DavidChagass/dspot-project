<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dspot - O melhor lugar para o seu estoque</title>

    <!-- Scripts -->
    <script defer src="{{ asset('js/welcome.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="bg-gray-100">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-between sm:items-stretch">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="{{ asset('/src/Group 4 (1).png' )}}" alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="{{route('empresa.register')}}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Create Depot</a>
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Assinatura</a>
                            <a href="#sobre" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Sobre</a>
                            <div class="relative inline-block text-left">
                                <div>
                                    <a href="{{route('login')}}" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="bnt-dropdown" aria-expanded="true" aria-haspopup="true">
                                        Entrar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pointer inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" id="btn-dropdown">
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
        </div>
        <div class="hidden sm:hidden" id="dropdown">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="{{route('empresa.register')}}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Create Depot</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Assinatura</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Sobre</a>
                <a href="{{route('login')}}" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Entrar</a>
            </div>
        </div>
    </nav>
    <section id="hero" data-aos="fade-up" class="bg-emerald-500 text-white text-center py-20">

        <h2 class="text-4xl font-bold">Bem-vindo ao Dspot</h2>

        <p id="typewriter" class="mt-4 text-lg"></p>

        <a href="#contato" class="mt-6 inline-block bg-white text-green-500 px-6 py-3 rounded-full font-semibold hover:bg-gray-200">Entre em Contato</a>

    </section>


    <section id="sobre" data-aos="fade-up" class="container mx-auto text-center py-20">

        <h2 class="text-3xl font-bold">Sobre Nós</h2>

        <p class="mt-4">Somos uma empresa dedicada a fornecer soluções inovadoras para nossos clientes.</p>

    </section>


    <section id="servicos" data-aos="fade-up" class="container mx-auto text-center py-20">

        <h2 class="text-3xl font-bold">Nossos Serviços</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">

            <div class="bg-white p-6 rounded-lg shadow-lg">

                <h3 class="text-xl font-semibold">Serviço 1</h3>

                <p class="mt-2">Descrição do serviço 1.</p>

            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">

                <h3 class="text-xl font-semibold">Serviço 2</h3>

                <p class="mt-2">Descrição do serviço 2.</p>

            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">

                <h3 class="text-xl font-semibold">Serviço 3</h3>

                <p class="mt-2">Descrição do serviço 3.</p>

            </div>

        </div>

    </section>


    <section id="contato" class="container mx-auto text-center py-20">

        <h2 class="text-3xl font-bold">Entre em Contato</h2>

        <form id="contactForm" class="mt-8 max-w-lg mx-auto">

            <input type="text" placeholder="Seu Nome" required class="w-full p-3 mb-4 border border-gray-300 rounded">

            <input type="email" placeholder="Seu Email" required class="w-full p-3 mb-4 border border-gray-300 rounded">

            <textarea placeholder="Sua Mensagem" required class="w-full p-3 mb-4 border border-gray-300 rounded"></textarea>

            <button type="submit" class="w-full bg-green-500 text-white py-3 rounded hover:bg-green-600">Enviar</button>

        </form>

    </section>


    <footer class="bg-gray-800 text-white text-center py-4">

        <p>&copy; 2024 Dspot. Todos os direitos reservados.</p>

    </footer>
    <script>

        AOS.init();
    
    </script>
</body>

</html>