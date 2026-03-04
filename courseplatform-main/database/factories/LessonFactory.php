<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Module;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class LessonFactory extends Factory
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
            'module_id' => Module::all()->random()->id,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'duration' => $this->faker->time(),
        ];
    }
}
