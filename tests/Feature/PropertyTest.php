<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
    }
    /**
     * A basic functional test example to invest.
     *
     * @return void
     */
    public function test_making_an_invest()
    {
        $response = $this->postJson('/api/v1/investments', ['user_id' => 1, 'property_id'=>3 ,"amount_invested"=>11263.2]);
        $response
            ->assertStatus(201);
    }
    
}
