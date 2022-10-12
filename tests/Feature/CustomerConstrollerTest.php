<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerConstrollerTest extends TestCase
{
    // use DatabaseMigrations;

    /**
     * @test
     */
    public function itListsCustomers()
    {
        Customer::factory(15)->create();

        $response = $this->get('/api/customers');
        $response->assertOk();
        $this->assertCount(15, $response->json('data'));
        $this->assertNotNull($response->json('data')[0]['telephone_number']);
    }

    /**
     * @test
     */
    public function itCreateCustumer()
    {
        $response = $this->post('/api/customers', [
            'name' => 'Mon premier client',
            'telephone_number' => '06XXXXXXXX',
            'is_favorite' => true,
        ]);

        $customers = Customer::all();
        $customer = Customer::first();

        $response->assertOk();
        $this->assertEquals(1, $customers->count());
        $this->assertEquals('Mon premier client', $customer->name);
    }

    /**
     * @test
     */
    public function itValidateFields()
    {
        $response = $this->post('/api/customers', [
            'name' => '',
            'telephone_number' => '',
            'is_favorite' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'telephone_number', 'is_favorite']);
    }
}
