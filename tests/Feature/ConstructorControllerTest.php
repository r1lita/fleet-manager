<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Constructor;

class ConstructorControllerTest extends TestCase
{
    
    use RefreshDatabase;
    
    /** List of constructors  */
    public function testConstructorControllerIndex()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('api/constructors');
        $response->assertStatus(200);

        // Create a constructor
        $constructors = Constructor::factory(10)->create();
        // $constructorPayload = [
        //     'name' => $this->faker->word(1),
        //     'description' => $this->faker->paragraph(),
        //     'logo' => Str::random(50)
        // ];
        $this->assertEquals(10, count(Constructor::all()));
        
        $response = $this->json('GET', 'api/constructors');

        $response->assertOk();
    }

    /** A constructor can be added */
    public function testConstructorCanBeAdded()
    {
        $this->withoutExceptionHandling();

        // Constructor data
        $constructorPayload = [
            'name' => $this->faker->word(2),
            'description' => $this->faker->paragraph()
        ];

        $this->json('POST', 'api/constructors', $constructorPayload)
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    'data' => 
                    [
                        'id',
                        'name',
                        'description',
                        'logo',
                        'updated_at'
                    ]
                ]
             );

        $this->assertDatabaseHas('constructors', $constructorPayload);
    }
}
