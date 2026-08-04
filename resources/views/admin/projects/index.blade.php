@extends('layouts.admin')

@section('title', 'Proyectos')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-gray-600">Catálogo de proyectos del portafolio.</p>
        <a href="{{ route('admin.projects.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">
            + Nuevo proyecto
        </a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500 uppercase">
                <tr>
                    <th class="px-4 py-3">Título</th>
                    <th class="px-4 py-3">Tipo</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Destacado</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($projects as $project)
                    <tr>
                        <td class="px-4 py-3">{{ $project->title }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $project->type->name ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <span @class([
                                'px-2 py-1 rounded text-xs font-medium',
                                'bg-green-100 text-green-700' => $project->status === 'published',
                                'bg-yellow-100 text-yellow-700' => $project->status === 'draft',
                                'bg-gray-100 text-gray-500' => $project->status === 'archived',
                            ])>
                                {{ ucfirst($project->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if ($project->featured)
                                <span class="text-yellow-500">★</span>
                            @else
                                <span class="text-gray-300">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline"
                                  onsubmit="return confirm('¿Eliminar este proyecto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-400">Aún no hay proyectos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
@endsection