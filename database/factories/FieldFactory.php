<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Field>
 */
class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subscriber_id' => \App\Models\Subscriber::all()->random()->Id,
            'title' => $this->faker->name(),
            'type' => $this->faker->randomElement(['date', 'number', 'string', 'boolean']),
        ];
    }
}
