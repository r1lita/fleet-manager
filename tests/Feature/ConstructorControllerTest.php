<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
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

    /** A constructor can be shown */
    public function testConstructorCanBeShown()
    {
        
        $this->withoutExceptionHandling();

        // create a constructor
        $constructor = Constructor::factory(1)->create();

        $this->assertEquals(1, count(Constructor::all()));
        // dd($constructor->id);
        $constructor = $constructor->first();
        
        $this->json('GET', "api/constructors/$constructor->id")
             ->assertStatus(200)
             ->assertJson(
                [ 
                    'data' =>[
                        'id' => $constructor->id,
                        'name' => $constructor->name,
                        'description' => $constructor->description,
                        'logo' => $constructor->logo,
                        'updated_at' => Carbon::parse($constructor->updated_at)->format('Y-m-d H:i:s')
                    ]
                ]    
             );
    }

    /** A constructor can be updated */
    public function testConstructorCanBeUpdated()
    {
        $this->withoutExceptionHandling();

        // Create a constructor
        $constructorPayload = [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'logo' => $this->faker->word(1)
        ];
        $constructor = Constructor::create($constructorPayload);

        // update payload
        $updatePayload = [
            'name' => 'Updated name',
            'description' => 'Updated description',
            'logo' => 'updated logo'
        ];

        $this->json('PUT', "api/constructors/$constructor->id", $updatePayload)
             ->assertStatus(200)
             ->assertJson(
                [ 
                    'data' =>[
                        'id' => $constructor->id,
                        'name' => 'Updated name',
                        'description' => 'Updated description',
                        'logo' => 'updated logo',
                        'updated_at' => Carbon::parse($constructor->created_at)->format('Y-m-d H:i:s')
                    ]
                ]    
             );

    }

    /** A constructor can be deleted */
    public function testConstructorCanBeDeleted()
    {
        $this->withoutExceptionHandling();

        // Create a constructor
        $constructorPayload = [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'logo' => $this->faker->word(1)
        ];
        $constructor = Constructor::create($constructorPayload);

        // Delete vehicle
        $this->json('DELETE', "api/constructors/$constructor->id")
             ->assertStatus(204);

        $this->assertCount(0, Constructor::all());     
    }
}
