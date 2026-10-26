<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(4, true);

        return [
            'category_id' => Category::factory(),
            'name' => ucfirst($name),
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(100, 999),
            'reference' => 'TMZ-'.fake()->unique()->numerify('####'),
            'short_description' => fake()->sentence(15),
            'description' => fake()->paragraphs(3, true),
            'specifications' => [
                'Norme' => 'CE / ISO 13485',
                'Garantie' => '2 ans TAMAYAZ Côte d\'Ivoire',
                'Conditionnement' => 'Unité ou Lot professionnel',
            ],
            'image_url' => null,
            'badge' => fake()->randomElement(['Qualité Certifiée', 'Disponible', 'Sur Devis', null]),
            'in_stock' => true,
            'is_featured' => false,
            'is_active' => true,
        ];
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}
