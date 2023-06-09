<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'tags' => 'hot, cold',
            'company' => fake()->company(),
            'location' => fake()->city(),
            'email' => fake()->companyEmail(),
            'description' => fake()->paragraph(3)
        ];
    }
}
