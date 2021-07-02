<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Constructor;

class VehicleControllerTest extends TestCase
{
    
    use RefreshDatabase;
    
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

    public function testCanAddVehicule()
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
}
