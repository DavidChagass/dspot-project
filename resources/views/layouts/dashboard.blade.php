<!-- resources/views/layouts/auth-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dspot - O melhor lugar para o seu estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="{{ asset('js/historyBack.js') }}"></script>
    <script defer src="{{ asset('js/dashboard.utilities.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>
<body class="overflow-x-hidden">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-between sm:items-stretch">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="{{ asset('/src/Group 4 (1).png' )}}" alt="Your Company">
                    </div>
                    <div class="sm:ml-6 sm:block">
                        <div class="flex space-x-4 items-center">
                            <div class="grid justify-items-end items-center grid-cols-2 gap-x-2.5">
                                <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <p class="text-white">Bem-vindo!<br><strong class="capitalize">{{ $user->nome }}</strong></p>
                            </div>
                            <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Início</a>
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" aria-current="page">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <div class="container container-fluid">
        <div class="flex justify-center min-h-screen">
            <main class="container mx-auto p-1.5">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>

</html>