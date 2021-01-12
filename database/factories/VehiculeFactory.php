<?php

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehicule_maker' => $this->faker->words(2, true),
            'vehicule_model' => $this->faker->words(2, true),
            'color' => $this->faker->safeColorName(),
            'vin' => $this->faker->md5(),
            'in_service' => rand(0,1)
        ];
    }
}
