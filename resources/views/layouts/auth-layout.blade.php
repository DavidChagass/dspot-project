<!-- resources/views/layouts/auth-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/form.style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.utilities.css') }}">
    <script defer src="{{ asset('js/mascaras/mask.dominio.js') }}"></script>
    <script defer src="{{ asset('js/mascaras/mask.telefone.js') }}"></script>
    <script defer src="{{ asset('js/form.utilities.js') }}"></script>
    <script defer src="{{ asset('js/historyBack.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="overflow-hidden">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-between sm:items-stretch">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="{{ asset('/src/Group 4 (1).png' )}}" alt="Your Company">
                    </div>
                    <div class="sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <button class="voltarBtn rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Voltar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>

    <div class="container container-fluid">
        <div class="flex justify-center min-h-screen">
            <main class="flex items-center container-sm justify-center">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>

</html>