<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'campaign_name' => fake()->domainWord(),
            'target_amount' => fake()->randomNumber(8, true),
            'investment_multiple' => fake()->randomFloat(1, 20, 30),
            'status' => fake()->numberBetween(0, 1)
        ];
    }
}
