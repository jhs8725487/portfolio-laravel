@extends('layouts.admin')

@section('title', 'Posts del Blog')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-gray-600">Artículos del blog</p>
        <a href="{{ route('admin.posts.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">
            + Nuevo post
        </a>
    </div>

    @if (session('status'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500 uppercase">
                <tr>
                    <th class="px-4 py-3">Portada</th>
                    <th class="px-4 py-3">Título</th>
                    <th class="px-4 py-3">Categoría</th>
                    <th class="px-4 py-3">Autor</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Publicado</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($posts as $post)
                    <tr>
                        <td class="px-4 py-3">
                            @if ($post->cover_image)
                                <img src="{{ Storage::url($post->cover_image) }}"
                                     alt="{{ $post->title }}"
                                     class="h-12 w-12 object-cover rounded">
                            @else
                                <div class="h-12 w-12 bg-gray-100 rounded flex items-center justify-center text-xs text-gray-400">
                                    N/A
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $post->title }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $post->category?->name ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $post->author->name }}</td>
                        <td class="px-4 py-3">
                            @if ($post->status === 'published')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Publicado
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Borrador
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-gray-500 text-sm">
                            {{ $post->published_at?->format('d/m/Y') ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline"
                                  onsubmit="return confirm('¿Eliminar este post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-400">Aún no hay posts creados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endsection