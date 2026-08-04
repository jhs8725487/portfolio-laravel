@extends('layouts.public')

@section('title', 'Jhoel Herrera — Backend Developer')

@section('content')

    {{-- Hero --}}
    <section class="max-w-5xl mx-auto px-6 pt-24 pb-16">
        <p class="text-indigo-400 text-sm font-medium mb-3">Backend Developer · Laravel</p>
        <h1 class="text-4xl md:text-5xl font-bold tracking-tight mb-4">
            Hola, soy Jhoel Herrera.
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl">
            Construyo sistemas web robustos con Laravel, aplicaciones Android con Kotlin,
            y me enfoco en arquitectura limpia y buenas prácticas de código.
        </p>
        <div class="flex gap-4 mt-8">
            <a href="#proyectos" class="bg-indigo-600 hover:bg-indigo-500 transition px-5 py-2.5 rounded-lg text-sm font-medium">
                Ver proyectos
            </a>
            <a href="#contacto" class="border border-gray-700 hover:border-gray-500 transition px-5 py-2.5 rounded-lg text-sm font-medium">
                Contactarme
            </a>
        </div>
    </section>

    {{-- Proyectos destacados --}}
    @if ($featuredProjects->isNotEmpty())
        <section class="max-w-5xl mx-auto px-6 py-16 border-t border-gray-800">
            <h2 class="text-2xl font-bold mb-8">Proyectos destacados</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($featuredProjects as $project)
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-indigo-500 transition">
                        <span class="text-xs text-indigo-400 font-medium">{{ $project->type->name }}</span>
                        <h3 class="text-lg font-semibold mt-2 mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-400 text-sm mb-4">{{ $project->short_description }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($project->technologies->take(3) as $tech)
                                <span class="text-xs bg-gray-800 text-gray-300 px-2 py-1 rounded">{{ $tech->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Todos los proyectos --}}
    <section id="proyectos" class="max-w-5xl mx-auto px-6 py-16 border-t border-gray-800">
        <h2 class="text-2xl font-bold mb-8">Todos los proyectos</h2>
        <div class="grid md:grid-cols-2 gap-6">
            @forelse ($projects as $project)
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                    <span class="text-xs text-indigo-400 font-medium">{{ $project->type->name }}</span>
                    <h3 class="text-lg font-semibold mt-2 mb-2">{{ $project->title }}</h3>
                    <p class="text-gray-400 text-sm mb-4">{{ $project->short_description }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach ($project->technologies as $tech)
                            <span class="text-xs bg-gray-800 text-gray-300 px-2 py-1 rounded">{{ $tech->name }}</span>
                        @endforeach
                    </div>
                    <div class="flex gap-4 text-sm">
                        @if ($project->repo_url)
                            <a href="{{ $project->repo_url }}" target="_blank" class="text-indigo-400 hover:underline">Código</a>
                        @endif
                        @if ($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" class="text-indigo-400 hover:underline">Demo</a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Aún no hay proyectos publicados.</p>
            @endforelse
        </div>
    </section>

    {{-- Contacto --}}
    <section id="contacto" class="max-w-5xl mx-auto px-6 py-16 border-t border-gray-800">
        <h2 class="text-2xl font-bold mb-4">Contacto</h2>
        <p class="text-gray-400 mb-6">¿Tenés un proyecto en mente? Escribime.</p>
        <a href="mailto:tu-email@ejemplo.com" class="text-indigo-400 hover:underline">tu-email@ejemplo.com</a>
    </section>

@endsection