<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Technology;
use App\Services\SlugService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::with('type')
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        $projectTypes = ProjectType::orderBy('name')->get();
        $technologies = Technology::orderBy('name')->get();

        return view('admin.projects.create', compact('projectTypes', 'technologies'));
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['slug'] = SlugService::unique(Project::class, $validated['title']);
        $validated['featured'] = $request->boolean('featured');

        $project = Project::create($validated);

        $project->technologies()->sync($validated['technologies'] ?? []);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyecto creado correctamente.');
    }

    public function edit(Project $project): View
    {
        $projectTypes = ProjectType::orderBy('name')->get();
        $technologies = Technology::orderBy('name')->get();
        $project->load('technologies');

        return view('admin.projects.edit', compact('project', 'projectTypes', 'technologies'));
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $validated = $request->validated();
        $validated['featured'] = $request->boolean('featured');

        if ($validated['title'] !== $project->title) {
            $validated['slug'] = SlugService::unique(Project::class, $validated['title'], $project->id);
        }

        $project->update($validated);

        $project->technologies()->sync($validated['technologies'] ?? []);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyecto eliminado.');
    }
}