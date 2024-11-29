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
    <div class="mx-auto max-w-7xl gap-20 px-6 lg:px-8">
        <form class="flex flex-col" action="{{ url('/empresa/estoque/'.$estoque->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label class="block pr-2 text-sm font-medium leading-6 text-gray-900" for="nome">nome do estoque</label>
                <input class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="nome" required id="nome" wire:model="nome" value="{{ $estoque->nome }}">
                @error('nome')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex m-2 justify-around">
                <a href="#" class="voltarBtn rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Voltar</a>
                <button class="rounded-md bg-blue-900 px-3 py-2 text-sm font-medium text-white" type="submit">Salvar</button>
            </div>
        </form>
        <form class="flex m-2 justify-around" action=" {{ route('empresa.estoque.destroy', $estoque->id) }} " method="POST">
            @csrf
            @method('DELETE')
            <button class="rounded-md bg-red-900 px-3 py-2 text-sm font-medium text-white" type="submit">deletar o produto</button>
        </form>
    </div>
</div>