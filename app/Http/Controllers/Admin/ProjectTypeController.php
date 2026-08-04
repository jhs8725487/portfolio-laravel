<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectTypeRequest;
use App\Http\Requests\Admin\UpdateProjectTypeRequest;
use App\Models\ProjectType;
use App\Services\SlugService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectTypeController extends Controller
{
    public function index(): View
    {
        $projectTypes = ProjectType::withCount('projects')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.project-types.index', compact('projectTypes'));
    }

    public function create(): View
    {
        return view('admin.project-types.create');
    }

    public function store(StoreProjectTypeRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['slug'] = SlugService::unique(ProjectType::class, $validated['name']);

        ProjectType::create($validated);

        return redirect()
            ->route('admin.project-types.index')
            ->with('status', 'Tipo de proyecto creado correctamente.');
    }

    public function edit(ProjectType $projectType): View
    {
        return view('admin.project-types.edit', compact('projectType'));
    }

    public function update(UpdateProjectTypeRequest $request, ProjectType $projectType): RedirectResponse
    {
        $validated = $request->validated();

        if ($validated['name'] !== $projectType->name) {
            $validated['slug'] = SlugService::unique(ProjectType::class, $validated['name'], $projectType->id);
        }

        $projectType->update($validated);

        return redirect()
            ->route('admin.project-types.index')
            ->with('status', 'Tipo de proyecto actualizado correctamente.');
    }

    public function destroy(ProjectType $projectType): RedirectResponse
    {
        $projectType->delete();

        return redirect()
            ->route('admin.project-types.index')
            ->with('status', 'Tipo de proyecto eliminado.');
    }
}