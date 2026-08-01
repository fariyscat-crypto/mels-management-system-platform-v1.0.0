<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ProjectService
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Project::with('owner')
            ->when(request('search'), function (Builder $query, string $search) {
                $query->where(function (Builder $nested) use ($search) {
                    $nested
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function all()
    {
        return Project::with('owner')->latest()->get();
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): Project
    {
        $project->update($data);

        return $project;
    }

    public function delete(Project $project): void
    {
        $project->delete();
    }
}
