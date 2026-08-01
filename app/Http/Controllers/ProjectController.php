<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Services\ProjectService;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    public function __construct(protected ProjectService $service)
    {
    }

    public function index(): Response
    {
        $projects = $this->service->paginate();

        return Inertia::render('Projects/Index', [
            'projects' => $projects,
            'filters' => [
                'search' => request('search'),
            ],
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Projects/Create');
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['owner_id'] = $request->user()?->id ?? \App\Models\User::query()->value('id');
        $this->service->create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project): Response
    {
        return Inertia::render('Projects/Edit', [
            'project' => $project,
        ]);
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $data = $request->validated();
        $data['owner_id'] = $project->owner_id ?: ($request->user()?->id ?? \App\Models\User::query()->value('id'));
        $this->service->update($project, $data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->service->delete($project);

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
