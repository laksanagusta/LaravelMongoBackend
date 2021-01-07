<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PackageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api/package');
        $response->assertStatus(200);
    }

    public function test_create()
    {
        //Make sure data follows validation rule
        $formData = [
            'customer_name' => 'Dika Laksana', 
            'customer_address' => 'Cemara 2', 
            'customer_email' => 'daaawww@gmail.com', 
            'customer_phone' => '0819222811726', 
            'customer_address_detail' => 'jalan sukamaju', 
            'customer_zip_code' => 'PV19992', 
            'zone_code' => 'CKP01WE'
        ];

        $this->json('POST', route('package.store'), $formData)
            ->assertStatus(200);
    }

    public function test_update()
    {
        // $package = "5ff749443632000019001932";
        //Make sure data follows validation rule
        $formData = [
            'customer_name' => 'Dika Laksana', 
            'customer_address' => 'Cemara 2s', 
            'customer_email' => 'daaaaa@gmail.com', 
            'customer_phone' => '0819222811726', 
            'customer_address_detail' => 'jalan sukamaju', 
            'customer_zip_code' => 'PV19992', 
            'zone_code' => 'CKP01WE'
        ];

        $this->json('PUT', '/api/package/5ff749443632000019001932', $formData)
             ->assertStatus(201);

    
    }

    public function test_update_patch()
    {
        $formDataPatch = [
            'zone_code' => 'CKP0AA1WES'
        ];

        $this->json('PATCH', '/api/package/5ff749443632000019001932', $formDataPatch)
        ->assertStatus(200);
    }

    public function test_delete()
    {
        //make sure id still in database
        $package = "5ff749443632000019001932";
        $this->delete(route('package.destroy', $package))->assertStatus(200);
    }
}
