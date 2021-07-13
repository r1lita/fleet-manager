<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use App\Models\Constructor;
use App\Models\Vehicle;
use App\Traits\AttachJwtToken;

class VehicleControllerTest extends TestCase
{
    
    use RefreshDatabase, AttachJwtToken;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
     public function testVehicleControllerIndex()
    {
        $response = $this->get('api/vehicles');

        $response->assertStatus(200);
    }

    /** We can add a vehicle */
    public function testVehicleCanBeAdded()
    {
        $this->withoutExceptionHandling();

        // Create a constructor
        $payload = [
            'name' => $this->faker->firstName,
            'description'  => $this->faker->text,
            'logo'      => $this->faker->word(1)
        ];
        $constructor = Constructor::create($payload);
        
        $data = [
            'vehicle_model' => 'Mazda CX5',
            'color' => 'Mavo adala',
            'vin' => '123456789AZERTYUI',
            'in_service' => 1,
            'constructor_id' => $constructor->id
        ];

        $this->get('api/vehicles')
             ->assertStatus(200);
        
        $this->post('api/vehicles', $data)
             ->assertStatus(201)
             ->assertJsonStructure(
                [
                    'data' => 
                    [
                        'constructor_id',
                        'vehicle_model',
                        'color',
                        'vin',
                        'in_service',
                        'updated_at'
                    ]
                ]
             );

        $this->assertDatabaseHas('vehicles', $data);

    }

    /** A vehicle can be shown */
    public function testVehicleCanBeShown()
    {
        $this->withoutExceptionHandling();

        // Create a constructor
        $constructorPayload = [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'logo' => $this->faker->word(1)
        ];
        $constructor = Constructor::create($constructorPayload);

        // Create a vehicle
        $vehiclePayload = [
            'vehicle_model' => $this->faker->word(2),
            'color' => $this->faker->safeColorName(),
            'vin' =>  Str::random(17),
            'in_service' => 1,
            'constructor_id' => $constructor->id
        ];
        $vehicle = Vehicle::create($vehiclePayload);

        $this->json('GET', "api/vehicles/$vehicle->id")
             ->assertStatus(200)
             ->assertJson(
                [ 
                    'data' =>[
                        'id' => $vehicle->id,
                        'constructor_id' => $vehicle->constructor_id,
                        'vehicle_model' => $vehicle->vehicle_model,
                        'color' => $vehicle->color,
                        'vin' => $vehicle->vin,
                        'in_service' => $vehicle->in_service,
                        'updated_at' => Carbon::parse($vehicle->created_at)->format('Y-m-d H:i:s')
                    ]
                ]    
             );
    }

    /** Vehicle can be updated */
    public function testVehiculeCanBeUpdated()
    {
        $this->withoutExceptionHandling();

        // Create a constructor
        $constructorPayload = [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'logo' => $this->faker->word(1)
        ];
        $constructor = Constructor::create($constructorPayload);

        // Create a vehicle
        $vehiclePayload = [
            'vehicle_model' => $this->faker->word(2),
            'color' => $this->faker->safeColorName(),
            'vin' =>  Str::random(17),
            'in_service' => 1,
            'constructor_id' => $constructor->id,
            "updated_at" => Carbon::now()->timestamp,
            "created_at" => Carbon::now()->timestamp
        ];
        $vehicle = Vehicle::create($vehiclePayload);

        // update payload
        $updatePayload = [
            'vehicle_model' => 'Updatet Model',
            'color' => 'red and brown',
            'vin' =>  'thisisanewvinnumb',
            'in_service' => 1,
            'constructor_id' => $constructor->id
        ];

        $this->json('PUT', "api/vehicles/$vehicle->id", $updatePayload)
             ->assertStatus(200)
             ->assertJson(
                [ 
                    'data' =>[
                        'id' => $vehicle->id,
                        'constructor_id' => $updatePayload['constructor_id'],
                        'vehicle_model' => $updatePayload['vehicle_model'],
                        'color' => $updatePayload['color'],
                        'vin' => $updatePayload['vin'],
                        'in_service' => $updatePayload['in_service'],
                        'updated_at' => Carbon::parse($vehicle->created_at)->format('Y-m-d H:i:s')
                    ]
                ]    
             );

    }

    /** A vehicle can be deleted */
    public function testVehicleCanBeDeleted()
    {
        $this->withoutExceptionHandling();

        // Create a constructor
        $constructorPayload = [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'logo' => $this->faker->word(1)
        ];
        $constructor = Constructor::create($constructorPayload);

        // Create a vehicle
        $vehiclePayload = [
            'vehicle_model' => $this->faker->word(2),
            'color' => $this->faker->safeColorName(),
            'vin' =>  Str::random(17),
            'in_service' => 1,
            'constructor_id' => $constructor->id
        ];
        
        $this->post('api/vehicles', $vehiclePayload)
             ->assertStatus(201)
             ->assertJsonStructure(
                [
                    'data' => 
                    [
                        'constructor_id',
                        'vehicle_model',
                        'color',
                        'vin',
                        'in_service',
                        'updated_at'
                    ]
                ]
             );

        $this->assertDatabaseHas('vehicles', $vehiclePayload);

        // Retrieve created vehicle
        $vehicle = Vehicle::first();

        // Delete vehicle
        $this->json('DELETE', "api/vehicles/$vehicle->id")
             ->assertStatus(204);

        $this->assertCount(0, Vehicle::all());     
    }
}
