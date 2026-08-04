@extends('layouts.public')

@section('title', $project->title . ' — Jhoel Herrera')
@section('description', $project->short_description)

@section('content')

    <section class="max-w-3xl mx-auto px-6 pt-24 pb-16">

        <a href="{{ route('home') }}#proyectos" class="text-indigo-400 text-sm hover:underline">&larr; Volver a proyectos</a>

        <p class="text-indigo-400 text-sm font-medium mt-6 mb-2">{{ $project->type->name }}</p>
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight mb-4">{{ $project->title }}</h1>
        <p class="text-gray-400 text-lg mb-8">{{ $project->short_description }}</p>

        <div class="flex flex-wrap gap-2 mb-10">
            @foreach ($project->technologies as $tech)
                <span class="text-xs bg-gray-800 text-gray-300 px-2 py-1 rounded">{{ $tech->name }}</span>
            @endforeach
        </div>

        <div class="flex gap-4 mb-12">
            @if ($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank"
                   class="bg-gray-900 border border-gray-700 hover:border-gray-500 transition px-5 py-2.5 rounded-lg text-sm font-medium">
                    Ver código
                </a>
            @endif
            @if ($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank"
                   class="bg-indigo-600 hover:bg-indigo-500 transition px-5 py-2.5 rounded-lg text-sm font-medium">
                    Ver demo
                </a>
            @endif
        </div>

        @if ($project->problem)
            <div class="mb-10">
                <h2 class="text-xl font-semibold mb-2">El problema</h2>
                <p class="text-gray-400 leading-relaxed">{{ $project->problem }}</p>
            </div>
        @endif

        @if ($project->solution)
            <div class="mb-10">
                <h2 class="text-xl font-semibold mb-2">La solución</h2>
                <p class="text-gray-400 leading-relaxed">{{ $project->solution }}</p>
            </div>
        @endif

        @if ($project->features)
            <div class="mb-10">
                <h2 class="text-xl font-semibold mb-2">Funcionalidades</h2>
                <ul class="list-disc list-inside text-gray-400 space-y-1">
                    @foreach ($project->features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($project->results)
            <div class="mb-10">
                <h2 class="text-xl font-semibold mb-2">Resultados</h2>
                <p class="text-gray-400 leading-relaxed">{{ $project->results }}</p>
            </div>
        @endif

        @if ($project->challenges)
            <div class="mb-10">
                <h2 class="text-xl font-semibold mb-2">Desafíos</h2>
                <p class="text-gray-400 leading-relaxed">{{ $project->challenges }}</p>
            </div>
        @endif

        @if ($project->lessons_learned)
            <div class="mb-10">
                <h2 class="text-xl font-semibold mb-2">Lecciones aprendidas</h2>
                <p class="text-gray-400 leading-relaxed">{{ $project->lessons_learned }}</p>
            </div>
        @endif

    </section>

@endsection