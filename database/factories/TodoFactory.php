<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
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
            'completed' => fake()->boolean()
        ];
    }

    public function completed()
    {
        return $this->state(fn (array $attributes) => [
            'completed' => true
        ]);
    }

    public function uncompleted()
    {
        return $this->state(fn (array $attributes) => [
            'is_completed' => false,
        ]);
    }
}
