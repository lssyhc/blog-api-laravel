<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio' => fake()->boolean(70) ? fake()->paragraph() : null,
            'profile_photo_path' => 'https://i.pravatar.cc/300?u=' . fake()->uuid()
        ];
    }
}
