<div>
    <!-- Cabeçalho com navegação -->
    <header class="bg-slate-200 flex rounded border-2 border-solid border-gray-300">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-1 lg:px-8" aria-label="Global">
            <!-- Menu móvel -->
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Abrir menu principal</span>
                    <!-- Ícone de menu para dispositivos móveis -->
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Menu para telas grandes -->
            <div class="hidden lg:flex lg:gap-x-12">
                <div id="btn-dropdown" class="relative">
                    <button type="button" class="flex items-center gap-x-1 text-sm/6 font-semibold text-gray-900" aria-expanded="false">
                        Produto
                        <!-- Ícone de seta para dropdown -->
                        <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown com várias opções -->
                    <div id="dropdown" class="hidden absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-slate-200 shadow-lg ring-1 ring-gray-900/5">
                        <div class="p-4">
                            <!-- Cada item dentro do dropdown -->
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                                <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <!-- Ícone para o item Analytics -->
                                    <svg class="size-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <!-- Link do item -->
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Analytics
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">Obtenha uma melhor compreensão do seu tráfego</p>
                                </div>
                            </div>

                            <!-- Outros itens do menu dropdown com ícones e descrições -->
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                                <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="size-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Engagement
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">Speak directly to your customers</p>
                                </div>
                            </div>
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                                <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="size-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Security
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">Your customers’ data will be safe and secure</p>
                                </div>
                            </div>
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                                <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="size-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Integrations
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">Fale diretamente com seus clientes</p>
                                </div>
                            </div>
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                                <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="size-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-gray-900">
                                        Automations
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">Build strategic funnels that will convert</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                            <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
                                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd" />
                                </svg>
                                Watch demo
                            </a>
                            <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
                                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z" clip-rule="evenodd" />
                                </svg>
                                Contact sales
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Outros links na barra de navegação -->
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Recursos</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Marketplace</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Empresa</a>
            </div>
        </nav>

        <!-- Menu móvel, exibido quando o menu está aberto -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Fundo do menu, visível apenas quando o menu está aberto -->
            <div class="fixed inset-0 z-10"></div>
            <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <!-- Fechar o menu -->
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Sua Empresa</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Fechar menu</span>
                        <!-- Ícone de fechar -->
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Links do menu móvel -->
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <div class="-mx-3">
                                <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                                    Produto
                                    <svg class="size-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- Submenu do item 'Produto' -->
                                <div class="mt-2 space-y-2" id="disclosure-1">
                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Analytics</a>
                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Engagement</a>
                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Security</a>
                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Integrations</a>
                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Automations</a>
                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Watch demo</a>
                                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Contact sales</a>
                                </div>
                            </div>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Features</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Marketplace</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
                        </div>
                        <div class="py-6">
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="p-4">
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-blue-600">
                        <i class="fas fa-tasks">
                        </i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            211
                        </div>
                        <div>
                            Total No.Of Plans
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-blue-600">
                        <i class="fas fa-spinner">
                        </i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            31
                        </div>
                        <div>
                            Plans in progress
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-blue-600">
                        <i class="fas fa-check-circle">
                        </i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            246
                        </div>
                        <div>
                            Plans Completed
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-center font-bold mb-4">
                Funcionários
            </h2>
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            Nome
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            Cargo
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            Ações
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            <a href="{{ route('gerente-register') }}"><i class="fa-regular fa-plus"></i> registrar gerente</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">
                            João Silva
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Gerente
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Vendas
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            joao.silva@empresa.com
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Maria Oliveira
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Funcionário
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Vendas
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            maria.oliveira@empresa.com
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Carlos Pereira
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Gerente
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            TI
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            carlos.pereira@empresa.com
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Ana Costa
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Funcionário
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            TI
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            ana.costa@empresa.com
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Pedro Santos
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Gerente
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            RH
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            pedro.santos@empresa.com
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Luiza Almeida
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            Funcionário
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            RH
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            luiza.almeida@empresa.com
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-center font-bold mb-4">
                Estoques
            </h2>
            <a class="mb-2" href="{{ route('empresa.estoque.create') }}"><i class="fa-regular fa-plus"></i> criar novo estoque</a>
            @foreach ($estoques as $es)
            <table class="min-w-full bg-white table-auto shadow mb-4">
                <thead>
                    <tr>
                        <th colspan="4" class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-center text-sm  leading-4 text-gray-600 uppercase tracking-wider">{{ $es->nome }}</th>
                        <th colspan="1" class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-center text-sm  leading-4 text-gray-600 uppercase tracking-wider"><a href="{{ route('empresa.estoque.edit', $es->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar Estoque</a></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            Produto
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            Quantidade Atual
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            Quantidade Total
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            Ações
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            <a href="{{route('empresa.produtos.create')}}"><i class="fa-regular fa-plus"></i> Criar produto</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($es->produtos as $prod)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $prod->produto }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $prod->quantidadeAtual }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $prod->quantidadeTotal }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            <a href="{{ route('empresa.produtos.show', $prod->id) }}">mostrar mais detalhes</a>
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $prod->updated_at }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endforeach
        </div>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-green-600">
                        <i class="fas fa-tasks">
                        </i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            189
                        </div>
                        <div>
                            Total No.Of Orders
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-green-600">
                        <i class="fas fa-spinner">
                        </i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            16
                        </div>
                        <div>
                            Orders In-Progress
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-green-600">
                        <i class="fas fa-check-circle">
                        </i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            158
                        </div>
                        <div>
                            Orders Completed
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-center font-bold mb-4">
                    Procurement Status (Overall)
                </h2>
                <img alt="Funnel chart showing procurement status with sections for Planned, Approved, In Progress, and Finished" height="200" src="https://storage.googleapis.com/a1aa/image/oye9swgMh5TQOKlbra8bG1tgLIXP9PgqRbeuNef6o8mfVyseE.jpg" width="300" />
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-center font-bold mb-4">
                    Money Spent For The Orders
                </h2>
                <img alt="Bar chart showing money spent for orders with Amount Paid and Amount To Pay" height="200" src="https://storage.googleapis.com/a1aa/image/k1msJZZggPK3B1VfKAf36pQeZu7XqxjHbANextdVHSf2VyseE.jpg" width="300" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-center font-bold mb-4">
                    Purchase Order (Overall)
                </h2>
                <img alt="Funnel chart showing purchase order status with sections for Pending, Confirmed, and Finished" height="200" src="https://storage.googleapis.com/a1aa/image/gTGOtz6PYNLTPVc2CkFs5eQks1EAVc15QYiTFHVFz3LVJz6JA.jpg" width="300" />
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-center font-bold mb-4">
                    Top Vendors By Orders
                </h2>
                <img alt="Pie chart showing top vendors by orders with categories for Caso, CAT, Telemark, and Vens &amp; co" height="200" src="https://storage.googleapis.com/a1aa/image/gECCAwe2y0V2SCltEPmlJ3basls99ZHovnL1sMEWdXesSm1TA.jpg" width="300" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-center font-bold mb-4">
                    Vendors
                </h2>
                <div class="flex justify-between items-center mb-4">
                    <div>
                        No.Of Vendors
                    </div>
                    <div class="text-2xl font-bold">
                        <i class="fas fa-users">
                        </i>
                        13
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="bg-blue-500 text-white p-2 rounded flex justify-between items-center">
                        <div>
                            5
                        </div>
                        <div>
                            Vendors In Contract
                        </div>
                    </div>
                    <div class="bg-yellow-500 text-white p-2 rounded flex justify-between items-center">
                        <div>
                            4
                        </div>
                        <div>
                            Top Rated Vendors
                        </div>
                    </div>
                    <div class="bg-gray-500 text-white p-2 rounded flex justify-between items-center">
                        <div>
                            7
                        </div>
                        <div>
                            Neutral Vendors
                        </div>
                    </div>
                    <div class="bg-brown-500 text-white p-2 rounded flex justify-between items-center">
                        <div>
                            2
                        </div>
                        <div>
                            Low Rated Vendors
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-center font-bold mb-4">
                    Top Vendors By Payments
                </h2>
                <img alt="Pie chart showing top vendors by payments with categories for Caso, CAT, Telemark, and Vens &amp; co" height="200" src="https://storage.googleapis.com/a1aa/image/JGn1hm55QbKEEhrwUUEMRGMvMynsvRnNuUT5HPFcdo2qkZ9E.jpg" width="300" />
            </div>
        </div>
        </main>
    </div>

</div>