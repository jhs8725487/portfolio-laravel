@extends('layouts.public')

@section('title', 'Blog | Jhoel Herrera')
@section('description', 'Artículos sobre Laravel, desarrollo backend, arquitectura de software y proyectos web.')

@section('content')
    <section class="max-w-5xl mx-auto px-6 py-16">
        <p class="text-sm font-medium text-indigo-400">Blog</p>
        <h1 class="mt-2 text-4xl font-bold text-white">Artículos y aprendizajes</h1>
        <p class="mt-4 max-w-2xl text-gray-400">
            Comparto experiencias construyendo aplicaciones con Laravel, buenas prácticas y desarrollo backend.
        </p>

        @if ($posts->isEmpty())
            <div class="mt-12 border border-gray-800 py-12 text-center text-gray-400">
                Aún no hay artículos publicados.
            </div>
        @else
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="overflow-hidden rounded-lg border border-gray-800 bg-gray-900 transition hover:border-indigo-400">
                        @if ($post->cover_image)
                            <img src="{{ asset('storage/' . $post->cover_image) }}"
                                 alt="{{ $post->title }}"
                                 class="h-44 w-full object-cover">
                        @else
                            <div class="h-44 bg-gray-800"></div>
                        @endif

                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400">
                                @if ($post->category)
                                    <span class="text-indigo-400">{{ $post->category->name }}</span>
                                @endif

                                @if ($post->published_at)
                                    <span>{{ $post->published_at->format('d/m/Y') }}</span>
                                @endif
                            </div>

                            <h2 class="mt-3 text-xl font-semibold text-white">
                                <a href="{{ route('blog.show', $post) }}" class="hover:text-indigo-400">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <p class="mt-3 text-sm leading-6 text-gray-400">
                                {{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 130) }}
                            </p>

                            <a href="{{ route('blog.show', $post) }}"
                               class="mt-5 inline-block text-sm font-medium text-indigo-400 hover:text-indigo-300">
                                Leer artículo →
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $posts->links() }}
            </div>
        @endif
    </section>
@endsection