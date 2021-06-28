<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $constructor = \App\Models\Constructor::factory(10)->create()->each(function ($constructor) {
            $vehicules = \App\Models\Vehicule::factory(20)->create();
            $constructor->vehicules()->saveMany($vehicules);
        });
        // $this->call(VehiculeSeeder::class);
    }
}
