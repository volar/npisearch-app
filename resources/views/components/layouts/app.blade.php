<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'NPI search app' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
            <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="antialiased bg-gray-100 d-flex flex-column">
        <header class="bg-primary text-white p-4 text-center">
            <h1 class="text-xl font-bold">NPI Search App</h1>
        </header>

        <main class="container my-4">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                {{ $slot }}
            </div>
        </main>

        <footer class="bg-primary text-white p-4 text-center mt-auto">
            &copy; 2023 NPI Search App
        </footer>
        @livewireScripts
    </body>
</html>
