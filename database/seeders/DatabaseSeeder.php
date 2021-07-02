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
        \App\Models\User::factory(10)->create();
        
        $constructor = \App\Models\Constructor::factory(10)->create()->each(function ($constructor) {
            $vehicles = \App\Models\Vehicle::factory(20)->create();
            $constructor->vehicles()->saveMany($vehicles);
        });
        // $this->call(VehicleSeeder::class);
    }
}
