<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \Faker\Provider\Lorem($this->faker));
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'start_date' => $this->faker->dateTimeBetween('+1 days', '+10 days'),
            'end_date' => $this->faker->dateTimeBetween('+11 days', '+30 days'),
        ];
    }
}
