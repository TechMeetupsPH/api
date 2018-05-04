<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Organization;

class CreateOrganizationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function organization_can_be_created()
    {

        $response = $this->post('/api/organization', [
            'name' => 'Test Name',
            'about' => 'Test About',
            'address' => 'Test Address',
        ]);

        $response->assertStatus(200);

        $organization = Organization::where('name', '=', 'Test Name')->first();

        $this->assertEquals($organization->name, 'Test Name');
        $this->assertEquals($organization->about, 'Test About');
        $this->assertEquals($organization->address, 'Test Address');
    }
}
