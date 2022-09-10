<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'property_name' => fake()->domainWord(),
            // 'image' => fake()->imageUrl(640, 480, 'animals', true),
            'property_size' => fake()->randomFloat(2, 10, 3000),
            // 'target_amount' => fake()->randomNumber(8, true),
            'property_type' => fake()->sentence(2),
            'bedrooms' => fake()->numberBetween(1, 12),
            'bathrooms' => fake()->numberBetween(1, 6),
            // 'country' => "UAE",
            'location_id' => fake()->numberBetween(1, 10)
            // 'investment_multiple' => fake()->randomFloat(1, 20, 30)
        ];
    }
}
