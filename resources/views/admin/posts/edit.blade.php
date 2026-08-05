@extends('layouts.admin')

@section('title', 'Editar Post')

@section('content')
    <div class="bg-white rounded shadow p-6">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                       class="w-full border-gray-300 rounded shadow-sm">
                @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
                <select name="category_id" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="">-- Sin categoría --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Extracto</label>
                <input type="text" name="excerpt" value="{{ old('excerpt', $post->excerpt) }}"
                       class="w-full border-gray-300 rounded shadow-sm">
                @error('excerpt') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
                <textarea name="content" rows="10"
                          class="w-full border-gray-300 rounded shadow-sm">{{ old('content', $post->content) }}</textarea>
                @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Imagen de portada</label>

                @if ($post->cover_image)
                    <img src="{{ asset('storage/' . $post->cover_image) }}"
                         alt="Portada actual"
                         class="mb-3 h-28 w-40 rounded object-cover">
                @endif

                <input type="file" name="cover_image" accept="image/*"
                       class="w-full border-gray-300 rounded shadow-sm">
                @error('cover_image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                @php($selectedTags = old('tags', $post->tags->pluck('id')->all()))

                <select name="tags[]" multiple class="w-full border-gray-300 rounded shadow-sm" size="5">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 mt-1">Mantén Ctrl (o Cmd) para seleccionar varios.</p>
                @error('tags') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4 flex gap-6">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                    <select name="status" class="w-full border-gray-300 rounded shadow-sm">
                        <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Borrador</option>
                        <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Publicado</option>
                    </select>
                    @error('status') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de publicación</label>
                    <input type="date" name="published_at"
                           value="{{ old('published_at', $post->published_at?->format('Y-m-d')) }}"
                           class="w-full border-gray-300 rounded shadow-sm">
                    @error('published_at') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                    Cancelar
                </a>
                <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Actualizar Post
                </button>
            </div>
        </form>
    </div>
@endsection