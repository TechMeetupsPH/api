<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function display_register_page()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSeeText('Sign up');
    }

    /**
     * @test
     */
    public function successful_user_registration_should_store_data_in_db()
    {
        $this->withoutExceptionHandling();

        $userData = [
            'name' => 'New User',
            'email' => 'new.user@mail.com',
            'password' => 'testpassword'
        ];

        $this->assertDatabaseMissing('user', $userData);

        $response = $this->post('/register', $userData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('user', $userData);
    }
}
