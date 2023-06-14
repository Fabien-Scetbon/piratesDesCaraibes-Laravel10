<?php

namespace Database\Factories;

use App\Models\Navire;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'               => $this->faker->name(),
            'prenom'            => $this->faker->firstName(),
            'pseudo'            => $this->faker->userName(),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'age'               => $this->faker->numberBetween($min = 16, $max = 60),
            'description'       => $this->faker->text($maxNbChars = 20),
            'navire_id'         => Navire::all()->random()->id,
            'is_capitaine'      => random_int(0, 1),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
