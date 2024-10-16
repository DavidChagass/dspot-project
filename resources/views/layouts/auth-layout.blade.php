<!-- resources/views/layouts/auth-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/form.style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.utilities.css') }}">
    <script defer src="{{ asset('js/mascaras.js') }}"></script>
    <script defer src="{{ asset('js/form.utilities.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="w-fit h-fit flex flex-col justify-center font-sans">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="">
            <img class="h-8 w-auto" src="{{ asset('src/Group 3.png')}}" alt="Your Company">
        </div>
    </nav>
    <div class="container container-fluid">
        <div class="flex justify-center min-h-screen">
            <main class="flex items-center">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>

</html>