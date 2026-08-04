<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Jhoel Herrera — Backend Developer')</title>
    <meta name="description" content="Portafolio de Jhoel Herrera, desarrollador backend Laravel.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-gray-100 antialiased">

    <header class="border-b border-gray-800 sticky top-0 bg-gray-950/90 backdrop-blur z-50">
        <nav class="max-w-5xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="font-bold text-lg tracking-tight">JH<span class="text-indigo-400">.</span></a>
            <div class="flex gap-6 text-sm text-gray-400">
                <a href="#proyectos" class="hover:text-white transition">Proyectos</a>
                <a href="#contacto" class="hover:text-white transition">Contacto</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-gray-800 mt-24">
        <div class="max-w-5xl mx-auto px-6 py-8 text-sm text-gray-500 flex justify-between">
            <span>&copy; {{ date('Y') }} Jhoel Herrera</span>
            <span>Cochabamba, Bolivia</span>
        </div>
    </footer>

</body>
</html>