<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;

class PropertyTest extends TestCase
{
    /**
     * A basic feature test for getting property result.
     *
     * @return void
     */
    public function test_fetch_properties_list()
    {
        $response = $this->get('api/v1/properties');
        $response->assertStatus(200);
        // $this->assertEquals(1, count($response->json()));
    }
    /**
     * A basic functional test example to invest.
     *
     * @return void
     */
    // public function test_making_an_invest()
    // {
    //     $response = $this->postJson('/api/v1/properties', ['user_id' => 1, 'camapaign_id'=>1]);
 
    //     $response
    //         ->assertStatus(201)
    //         ->assertJson([
    //             'created' => true,
    //         ]);
    // }
    
}
