<div>
    <!-- Cabeçalho com navegação -->
    <header class="bg-slate-200 flex rounded border-2 border-solid border-gray-300">
    </header>
    <div class="p-4">
        <!-- Contadores principais -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
            <!-- Card: Estoques -->
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-blue-600">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            {{ $estoquesCount }}
                        </div>
                        <div>Estoques Cadastrados</div>
                    </div>
                </div>
            </div>
            <!-- Card: Produtos -->
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-blue-600">
                        <i class="fa-solid fa-file-pen"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            {{ $produtosCount }}
                        </div>
                        <div>Produtos Cadastrados</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estoques -->
        <div id="tabProdutos" class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-center font-bold mb-4 text-lg md:text-xl">Estoques</h2>
            @foreach ($estoques as $es)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white table-auto shadow mb-4 text-sm md:text-base">
                    <thead>
                        <tr>
                            <th colspan="5" class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-center text-gray-600 uppercase">
                                {{ $es->nome }}
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                                Produto
                            </th>
                            <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                                Quantidade Atual
                            </th>
                            <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                                Quantidade Total
                            </th>
                            <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                                Ações
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
                                <a class="btn btn-primary" href="{{ route('funcionario.produtos.show', $prod->id) }}">Mostrar mais detalhes</a>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                {{ $prod->updated_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>

        <!-- Informações adicionais do estoque -->
        <div id="infoEstoque" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <!-- Card: Lucro parado -->
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-red-600">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            R$ {{ $lucroTotal }}
                        </div>
                        <div>Faturamento Bruto Parado no Estoque</div>
                    </div>
                </div>
            </div>
            <!-- Card: Perecíveis -->
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-red-600">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            {{ $pereciveisCount }}
                        </div>
                        <div>Número de Perecíveis em Estoque</div>
                    </div>
                </div>
            </div>
            <!-- Card: Quantidade Total -->
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4">
                    <div class="text-4xl text-blue-600">
                        <i class="fa-solid fa-square-poll-vertical"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">
                            {{ $quantidadeTotalAtual }}
                        </div>
                        <div>Quantidade Total em Estoque</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>