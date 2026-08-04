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

    {{-- Botón flotante de WhatsApp --}}
    <a href="https://wa.me/59160724012?text=Hola%20Jhoel%2C%20vi%20tu%20portafolio%20y%20me%20gustar%C3%ADa%20hablar%20sobre%20un%20proyecto."
       target="_blank"
       rel="noopener"
       class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-400 transition rounded-full p-4 shadow-lg z-50"
       aria-label="Contactar por WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-7 h-7">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.226 1.36.194 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
            <path d="M12.004 2C6.477 2 2 6.477 2 12c0 1.921.541 3.716 1.478 5.242L2 22l4.887-1.457A9.955 9.955 0 0 0 12.004 22C17.53 22 22 17.523 22 12S17.53 2 12.004 2zm0 18.062a8.026 8.026 0 0 1-4.293-1.246l-.308-.182-3.19.951.965-3.115-.2-.318A8.028 8.028 0 0 1 3.94 12c0-4.451 3.617-8.062 8.064-8.062 4.448 0 8.062 3.611 8.062 8.062 0 4.451-3.614 8.062-8.062 8.062z"/>
        </svg>
    </a>

</body>

</body>
</html>