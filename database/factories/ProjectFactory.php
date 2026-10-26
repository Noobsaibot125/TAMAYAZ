<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(5);

        return [
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(100, 999),
            'sector' => fake()->randomElement(['medical', 'mobilier', 'genie_civil']),
            'client_type' => fake()->randomElement(['Officine de Pharmacie', 'Infirmerie Scolaire', 'Clinique Médicale', 'Centre de Santé']),
            'location' => 'Cocody, Abidjan - Côte d\'Ivoire',
            'summary' => fake()->sentence(16),
            'description' => fake()->paragraphs(3, true),
            'image_url' => null,
            'completed_at' => fake()->date(),
            'is_featured' => true,
        ];
    }
}
