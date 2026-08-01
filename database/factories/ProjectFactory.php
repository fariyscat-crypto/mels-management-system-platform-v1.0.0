<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['planned', 'active', 'completed', 'archived']),
            'start_date' => $this->faker->dateTimeBetween('-30 days', '+15 days')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('+16 days', '+90 days')->format('Y-m-d'),
            'owner_id' => User::factory(),
        ];
    }
}
