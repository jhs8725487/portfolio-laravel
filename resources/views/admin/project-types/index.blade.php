@extends('layouts.admin')

@section('title', 'Tipos de Proyecto')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-gray-600">Catálogo de tipos de proyecto (Laravel, API, Android, etc.)</p>
        <a href="{{ route('admin.project-types.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">
            + Nuevo tipo
        </a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500 uppercase">
                <tr>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Slug</th>
                    <th class="px-4 py-3"># Proyectos</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($projectTypes as $type)
                    <tr>
                        <td class="px-4 py-3">{{ $type->name }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $type->slug }}</td>
                        <td class="px-4 py-3">{{ $type->projects_count }}</td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('admin.project-types.edit', $type) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('admin.project-types.destroy', $type) }}" method="POST" class="inline"
                                  onsubmit="return confirm('¿Eliminar este tipo de proyecto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-400">Aún no hay tipos de proyecto.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $projectTypes->links() }}
    </div>
@endsection