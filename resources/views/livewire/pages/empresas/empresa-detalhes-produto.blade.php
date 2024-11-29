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

<div class="flex bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl gap-20 px-6 lg:px-8 overflow-x-auto">
    <h1 class="text-3xl font-bold m-2">Informações do produto</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white table-auto shadow mb-4 text-sm md:text-base">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Produto
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Detalhes
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Perecivel
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Quantidade Atual
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Quantidade Total
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Preço Compra
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Preço Venda
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Data de Validade
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-gray-600 uppercase">
                            Fornecedor
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->produto }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->detalhes }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->perecivel ? 'sim' : 'não' }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->quantidadeAtual }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->quantidadeTotal }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->precoCompra }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->precoVenda }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->dataValidade }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            {{ $produto->fornecedor }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        
        <form class="flex justify-evenly" action=" {{ route('empresa.produtos.destroy', $produto->id) }} " method="POST">
            @csrf
            @method('DELETE')
            <a href="#" class="voltarBtn  rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Voltar</a>
            <a class="rounded-md bg-blue-900 px-3 py-2 text-sm font-medium text-white" href="{{ route('empresa.produtos.edit', $produto->id) }}">editar o produto</a>
            <button class="rounded-md bg-red-900 px-3 py-2 text-sm font-medium text-white" type="submit">Deletar o produto</button>
        </form>
    </div>
</div>