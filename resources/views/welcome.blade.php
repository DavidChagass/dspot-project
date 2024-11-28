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
                            <a href="{{route('empresa.register')}}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Criar Depósito</a>
                            <a href="#contato" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Assinatura</a>
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
                <a href="{{route('empresa.register')}}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Criar Depósito</a>
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

        <p class="mt-4 p-8 text-center">
            Na <strong>Dspot</strong>, transformamos a gestão de estoque em uma experiência eficiente e personalizada.<br>
            Somos especialistas no desenvolvimento de soluções inteligentes e sob medida, que atendem às necessidades únicas de cada cliente.<br>
            Combinando tecnologia de ponta, inovação e expertise, ajudamos empresas de todos os tamanhos a otimizar seus processos, reduzir <br> custos e alcançar maior controle sobre suas operações. <br> Nosso compromisso é simplificar a gestão de estoque, garantindo precisão, praticidade e resultados sólidos.
        </p>

        <article id="equipe" data-aos="fade-up" class="container mx-auto text-center p-6">
            <h2 class="text-2xl font-bold text-center mb-6">Conheça Nosso Time</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="w-24 h-24 overflow-hidden rounded-full mx-auto">
                        <img class="w-full h-full object-cover" src="{{ asset('/src/DavidTeodoro.jpg') }}" alt="Membro 1">
                    </div>
                    <h2 class="text-xl font-semibold text-center mt-4">David Teodoro</h2>
                    <p class="text-gray-600 text-center">Desenvolvedor Back-End</p>
                    <p class="text-gray-500 text-center mt-2">Desenvolvedor Back-End especializado em criar soluções robustas e escaláveis.</p>
                </div>

                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="w-24 h-24 overflow-hidden rounded-full mx-auto">
                        <img class="w-full h-full object-cover" src="{{ asset('/src/CaikGiordane.jpg') }}" alt="Membro 2">
                    </div>
                    <h2 class="text-xl font-semibold text-center mt-4">Caik Giordane</h2>
                    <p class="text-gray-600 text-center">Desenvolvedor Front-End</p>
                    <p class="text-gray-500 text-center mt-2">Desenvolvedor Front-End dedicado a criar interfaces intuitivas e experiências envolventes.</p>
                </div>

                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="w-24 h-24 overflow-hidden rounded-full mx-auto">
                        <img class="w-full h-full object-cover" src="{{ asset('/src/FernandoAlvarez.jpg') }}" alt="Membro 3">
                    </div>
                    <h2 class="text-xl font-semibold text-center mt-4">Fernando Alvarez</h2>
                    <p class="text-gray-600 text-center">Projetista - Comunicação</p>
                    <p class="text-gray-500 text-center mt-2">Projetista especializado em Comunicação, com foco em criar estratégias criativas e eficazes.</p>
                </div>
            </div>

            <div class="flex justify-center mt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <div class="w-24 h-24 overflow-hidden rounded-full mx-auto">
                            <img class="w-full h-full object-cover" src="{{ asset('/src/CaioEduardo.jpg') }}" alt="Membro 3">
                        </div>
                        <h2 class="text-xl font-semibold text-center mt-4">Caio Eduardo</h2>
                        <p class="text-gray-600 text-center">Design Gráfico</p>
                        <p class="text-gray-500 text-center mt-2">Designer Gráfico criativo e detalhista, especializado em desenvolver identidades visuais e materiais gráficos.</p>
                    </div>

                    <div class="bg-white shadow-md rounded-lg p-4">
                        <div class="w-24 h-24 overflow-hidden rounded-full mx-auto">
                            <img class="w-full h-full object-cover" src="{{ asset('/src/RaviAmaral.jpg') }}" alt="Membro 3">
                        </div>
                        <h2 class="text-xl font-semibold text-center mt-4">Ravi Amaral</h2>
                        <p class="text-gray-600 text-center">Tester - Analista</p>
                        <p class="text-gray-500 text-center mt-2">Tester e Analista meticuloso, especializado em garantir a qualidade e a funcionalidade de sistemas.</p>
                    </div>
                </div>
            </div>
        </article>

    </section>

    <section id="servicos" data-aos="fade-up" class="container mx-auto text-center py-20">

        <h2 class="text-3xl font-bold">Nossos Serviços</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">

            <div class="bg-white p-6 rounded-lg shadow-lg">

                <h3 class="text-xl font-semibold">Plataforma de Gerenciamento de Estoque</h3>

                <p class="mt-2">
                    Nossa plataforma oferece uma solução completa para otimizar a gestão de estoque. Com funcionalidades personalizáveis, você pode monitorar entradas e saídas, controlar níveis de inventário em tempo real e gerar relatórios detalhados.
                    Projetada para integrar-se perfeitamente aos seus processos, a plataforma ajuda a reduzir desperdícios, evitar rupturas e melhorar a eficiência operacional. Ideal para empresas que buscam mais controle e precisão no gerenciamento de seus recursos.
                </p>

            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">

                <h3 class="text-xl font-semibold">Adaptação de sistema</h3>

                <p class="mt-2">
                    Oferecemos serviços de adaptação de sistemas para atender às necessidades específicas do seu negócio. Nossa equipe especializada ajusta funcionalidades, integrações e processos para alinhar seu sistema atual às demandas operacionais e estratégias da sua empresa.
                    Com foco em personalização e eficiência, garantimos que a tecnologia seja uma aliada na sua rotina, proporcionando soluções sob medida para maximizar resultados e facilitar a gestão.
                </p>

            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">

                <h3 class="text-xl font-semibold">Acessoria e Consultoria Técnica</h3>

                <p class="mt-2">
                    Nossa assessoria e consultoria técnica oferecem suporte especializado para otimizar processos, identificar melhorias e implementar as melhores soluções tecnológicas para o seu negócio.
                    Contamos com profissionais experientes que analisam suas necessidades, fornecem recomendações estratégicas e garantem a execução de soluções eficientes, alinhadas com os objetivos da sua empresa. Seja para resolver problemas específicos ou aprimorar sistemas, estamos ao seu lado em cada etapa.
                </p>

            </div>

        </div>

    </section>


    <section id="contato" data-aos="fade-up" class="container mx-auto text-center py-20">

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