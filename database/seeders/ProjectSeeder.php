<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstWhere('email', 'admin@example.com') ?? User::factory()->create(['role' => 'admin']);

        Project::factory()->count(12)->create(['owner_id' => $admin->id]);
    }
}
