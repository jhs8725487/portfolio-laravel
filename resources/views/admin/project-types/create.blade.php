@extends('layouts.admin')

@section('title', 'Nuevo tipo de proyecto')

@section('content')
    <form action="{{ route('admin.project-types.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-lg">
        @csrf

        <label class="block mb-2 text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="w-full border rounded px-3 py-2 mb-1" placeholder="Ej: Sistema Web Laravel">
        @error('name')
            <p class="text-red-600 text-sm mb-3">{{ $message }}</p>
        @enderror

        <p class="text-xs text-gray-400 mt-2">El slug (URL amigable) se genera automáticamente a partir del nombre.</p>

        <div class="mt-4 flex gap-2">
            <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">Guardar</button>
            <a href="{{ route('admin.project-types.index') }}" class="px-4 py-2 text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
@endsection