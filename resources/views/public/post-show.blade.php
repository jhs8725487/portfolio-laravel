@extends('layouts.public')

@section('title', $post->title . ' | Jhoel Herrera')
@section('description', $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 160))

@section('content')
    <article class="max-w-3xl mx-auto px-6 py-16">
        <a href="{{ route('blog.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300">
            ← Volver al blog
        </a>

        <div class="mt-8">
            @if ($post->category)
                <p class="text-sm font-medium text-indigo-400">{{ $post->category->name }}</p>
            @endif

            <h1 class="mt-3 text-4xl font-bold leading-tight text-white">
                {{ $post->title }}
            </h1>

            <div class="mt-4 flex gap-3 text-sm text-gray-400">
                <span>{{ $post->author->name }}</span>

                @if ($post->published_at)
                    <span>{{ $post->published_at->format('d/m/Y') }}</span>
                @endif
            </div>
        </div>

        @if ($post->cover_image)
            <img src="{{ asset('storage/' . $post->cover_image) }}"
                 alt="{{ $post->title }}"
                 class="mt-8 w-full rounded-lg">
        @endif

        <div class="mt-8 whitespace-pre-line leading-8 text-gray-300">
            {{ $post->content }}
        </div>

        @if ($post->tags->isNotEmpty())
            <div class="mt-10 flex flex-wrap gap-2 border-t border-gray-800 pt-6">
                @foreach ($post->tags as $tag)
                    <span class="rounded bg-gray-800 px-3 py-1 text-sm text-gray-300">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        @endif
    </article>
@endsection