<?php

namespace Database\Factories;

use App\Models\Constructor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConstructorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Constructor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->paragraph(1)
        ];
    }
}
