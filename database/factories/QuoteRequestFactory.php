<?php

namespace Database\Factories;

use App\Models\QuoteRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QuoteRequest>
 */
class QuoteRequestFactory extends Factory
{
    protected $model = QuoteRequest::class;

    public function definition(): array
    {
        return [
            'product_id' => null,
            'sector' => fake()->randomElement(['medical', 'mobilier', 'genie_civil', 'general']),
            'request_type' => fake()->randomElement(['devis', 'contact']),
            'full_name' => fake()->name(),
            'company_name' => 'Pharmacie '.fake()->lastName(),
            'email' => fake()->safeEmail(),
            'phone' => '+225 07 09 01 87 47',
            'subject' => 'Demande de cotation équipements médicaux',
            'message' => fake()->paragraph(),
            'quantity' => fake()->numberBetween(1, 25),
            'status' => 'nouveau',
            'admin_notes' => null,
        ];
    }
}
