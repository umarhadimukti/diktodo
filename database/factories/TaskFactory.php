<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status_todo = ['pending', 'completed'];
        return [
            'user_id' => $this->faker->numberBetween(1, 17),
            'title' => $this->faker->words(mt_rand(1, 4), true),
            'description' => $this->faker->sentences(mt_rand(3, 6), true),
            'status' => $status_todo[mt_rand(0, 1)]
        ];
    }
}
