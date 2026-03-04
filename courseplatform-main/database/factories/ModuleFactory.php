<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class ModuleFactory extends Factory
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
            'course_id' => Course::all()->random()->id,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
        ];
    }
}
