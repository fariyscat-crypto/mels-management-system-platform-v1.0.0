<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function __construct(protected ProjectService $service)
    {
        $this->authorizeResource(Project::class, 'project');
    }

    public function index(): JsonResponse
    {
        return response()->json(ProjectResource::collection($this->service->all()));
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json(new ProjectResource($project));
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        $project = $this->service->create($request->validated());

        return response()->json(new ProjectResource($project), 201);
    }

    public function update(ProjectRequest $request, Project $project): JsonResponse
    {
        $project = $this->service->update($project, $request->validated());

        return response()->json(new ProjectResource($project));
    }

    public function destroy(Project $project): JsonResponse
    {
        $this->service->delete($project);

        return response()->json([], 204);
    }
}
