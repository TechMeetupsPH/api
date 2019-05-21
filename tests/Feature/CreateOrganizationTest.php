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

        $this->withoutExceptionHandling();

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

    /**
     * @test
     */
    public function organization_name_is_required()
    {

        $response = $this->json('POST', '/api/organization', [
            'about' => 'Test About',
            'address' => 'Test Address',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [
                        'The name field is required.'
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function organization_name_max_characters_should_be_255()
    {
        $response = $this->json('POST' , '/api/organization',[
            'name' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.
                      It has roots in a piece of classical Latin literature from 45 BC, making it over
                      2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                      Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                      Ipsum passage, and going through the cites of the word in classical literature,
                      discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                      of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in
                      45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                      The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'about' => 'about',
            'address' => 'address'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [
                        'The name may not be greater than 255 characters.'
                    ]
                ]
            ]);
    }

    /**
     * @test
     */
    public function organization_name_must_be_unique()
    {
        $organization = factory(Organization::class)->create([
            'name' => 'laravelph'
        ]);

        $response = $this->json('POST', '/api/organization',[
            'name' => 'laravelph',
            'about' => 'about',
            'address' => 'address',
        ]);

        $response->assertStatus(422);

        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [
                        "The name has already been taken."
                    ]
                ]
        ]);
    }

    
    /**
     * @test
    */
    public function organization_about_is_required()
    {

        $response = $this->json('POST', '/api/organization', [
            'name' => 'Test name',
            'address' => 'Test Address',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'about' => [
                        'The about field is required.'
                ]
            ]
        ]);
    }

    /** 
     * @test 
    */
    public function organization_address_max_characters_should_be_512()
    {
        $response = $this->json('POST','/api/organization', [
            'name' => 'Test Name',
            'about' => 'Test About',
            'address' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.
                        It has roots in a piece of classical Latin literature from 45 BC, making it over
                        2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                        Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                        Ipsum passage, and going through the cites of the word in classical literature,
                        discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                        of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in
                        45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                        The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        ]);
        
        $response->assertStatus(422);
        
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'address' => [
                        'The address may not be greater than 512 characters.'
                    ]
                ]
            ]);
    }

    public function organization_about_max_characters_should_be_512()
    {
        $response = $this->json('POST','/api/organization', [
            'name' => 'Test Name',
            'about' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.
                    It has roots in a piece of classical Latin literature from 45 BC, making it over
                    2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                    Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                    Ipsum passage, and going through the cites of the word in classical literature,
                    discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in
                    45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'address' => 'test address',
        ]);
        
        $response->assertStatus(422);
        
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'about' => [
                        'The about may not be greater than 512 characters.'
                    ]
                ]
            ]);
    }
}
