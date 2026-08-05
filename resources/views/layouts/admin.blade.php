<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title', 'Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <aside class="w-56 bg-gray-900 text-gray-200 flex-shrink-0">
            <div class="p-4 text-lg font-bold text-white">Portafolio Admin</div>
           <nav class="mt-4 space-y-1">
    <a href="{{ route('admin.project-types.index') }}"
       class="block px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('admin.project-types.*') ? 'bg-gray-800 text-white' : '' }}">
        Tipos de Proyecto
    </a>
    <a href="{{ route('admin.projects.index') }}"
       class="block px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('admin.projects.*') ? 'bg-gray-800 text-white' : '' }}">
        Proyectos
    </a>
    <a href="{{ route('admin.posts.index') }}"
       class="block px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('admin.posts.*') ? 'bg-gray-800 text-white' : '' }}">
        Blog
    </a>
</nav>
        </aside>

        <div class="flex-1">
            <header class="bg-white border-b px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Panel')</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-gray-500 hover:text-gray-800">Cerrar sesión</button>
                </form>
            </header>

            <main class="p-6">
                @if (session('status'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>