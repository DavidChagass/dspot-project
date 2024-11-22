<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1>Header Geral</h1>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>Footer Geral</p>
    </footer>
</body>
</html>