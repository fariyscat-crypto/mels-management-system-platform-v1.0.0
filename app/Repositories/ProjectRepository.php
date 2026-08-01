<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function findById(string $id): ?Project
    {
        return Project::with('owner')->find($id);
    }
}
