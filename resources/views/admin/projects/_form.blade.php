<div class="bg-white rounded shadow p-6 space-y-6">

    {{-- Tipo de proyecto --}}
    <div>
        <label class="block font-semibold mb-1">Tipo de proyecto</label>
        <select name="project_type_id" class="w-full border rounded px-3 py-2">
            <option value="">Seleccionar...</option>
            @foreach ($projectTypes as $type)
                <option value="{{ $type->id }}" @selected(old('project_type_id', $project->project_type_id ?? null) == $type->id)>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        @error('project_type_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Título --}}
    <div>
        <label class="block font-semibold mb-1">Título</label>
        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}"
               class="w-full border rounded px-3 py-2" placeholder="Ej: Sistema Web Laravel">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Descripción corta --}}
    <div>
        <label class="block font-semibold mb-1">Descripción corta</label>
        <textarea name="short_description" rows="2" class="w-full border rounded px-3 py-2"
                  placeholder="Resumen breve para listados">{{ old('short_description', $project->short_description ?? '') }}</textarea>
        @error('short_description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Problema / Solución --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-semibold mb-1">Problema</label>
            <textarea name="problem" rows="3" class="w-full border rounded px-3 py-2">{{ old('problem', $project->problem ?? '') }}</textarea>
        </div>
        <div>
            <label class="block font-semibold mb-1">Solución</label>
            <textarea name="solution" rows="3" class="w-full border rounded px-3 py-2">{{ old('solution', $project->solution ?? '') }}</textarea>
        </div>
    </div>

    {{-- Resultados / Desafíos / Lecciones --}}
    <div>
        <label class="block font-semibold mb-1">Resultados</label>
        <textarea name="results" rows="2" class="w-full border rounded px-3 py-2">{{ old('results', $project->results ?? '') }}</textarea>
    </div>
    <div>
        <label class="block font-semibold mb-1">Desafíos</label>
        <textarea name="challenges" rows="2" class="w-full border rounded px-3 py-2">{{ old('challenges', $project->challenges ?? '') }}</textarea>
    </div>
    <div>
        <label class="block font-semibold mb-1">Lecciones aprendidas</label>
        <textarea name="lessons_learned" rows="2" class="w-full border rounded px-3 py-2">{{ old('lessons_learned', $project->lessons_learned ?? '') }}</textarea>
    </div>

    {{-- URLs --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block font-semibold mb-1">URL del repositorio</label>
            <input type="url" name="repo_url" value="{{ old('repo_url', $project->repo_url ?? '') }}"
                   class="w-full border rounded px-3 py-2" placeholder="https://github.com/...">
            @error('repo_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">URL de demo</label>
            <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url ?? '') }}"
                   class="w-full border rounded px-3 py-2" placeholder="https://...">
            @error('demo_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">URL de video</label>
            <input type="url" name="video_url" value="{{ old('video_url', $project->video_url ?? '') }}"
                   class="w-full border rounded px-3 py-2" placeholder="https://youtube.com/...">
            @error('video_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Tecnologías --}}
    <div>
        <label class="block font-semibold mb-1">Tecnologías</label>
        <div class="flex flex-wrap gap-3 border rounded px-3 py-2">
            @php $selectedTechs = old('technologies', isset($project) ? $project->technologies->pluck('id')->toArray() : []); @endphp
            @foreach ($technologies as $tech)
                <label class="flex items-center gap-1 text-sm">
                    <input type="checkbox" name="technologies[]" value="{{ $tech->id }}"
                           @checked(in_array($tech->id, $selectedTechs))>
                    {{ $tech->name }}
                </label>
            @endforeach
        </div>
    </div>

 {{-- Estado, destacado, orden --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block font-semibold mb-1">Fecha de publicación</label>
            <input type="date" name="published_at"
                   value="{{ old('published_at', isset($project->published_at) ? $project->published_at->format('Y-m-d') : now()->format('Y-m-d')) }}"
                   class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Estado</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                @foreach (['draft' => 'Borrador', 'published' => 'Publicado', 'archived' => 'Archivado'] as $value => $label)
                    <option value="{{ $value }}" @selected(old('status', $project->status ?? 'draft') === $value)>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('status') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Orden</label>
            <input type="number" name="order" value="{{ old('order', $project->order ?? 0) }}"
                   class="w-full border rounded px-3 py-2" min="0">
        </div>
        <div class="flex items-center gap-2 mt-6">
            <input type="checkbox" name="featured" value="1" id="featured"
                   @checked(old('featured', $project->featured ?? false))>
            <label for="featured" class="font-semibold">Destacado</label>
        </div>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">
            Guardar
        </button>
        <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:underline self-center">Cancelar</a>
    </div>
</div>