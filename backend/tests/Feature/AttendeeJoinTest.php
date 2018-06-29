<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Attendee;
use App\Meetup;

class AttendeeJoinTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    /*public function attendee_can_join_meetups()
    {

        $this->withoutExceptionHandling();

        $response = $this->post('/api/attendee', [
            'email' => 'guest@tech.com',
            'meetup_id' => 1,
        ]);

        $response->assertStatus(200); 

        $response->assertJson([
            'id' => 1,
            'email' => 'guest@tech.com',
            'meetup_id' => 1
        ]);

        $attendee = Attendee::where('id', '=', 1)->first();

        $this->assertEquals($attendee->id, 1);
        $this->assertEquals($attendee->email, 'guest@tech.com');
        $this->assertEquals($attendee->meetup_id, 1);
    }*/
  
    /**
     * @test
     */
    public function attendee_should_join_existing_meetups()
    {
        $meetup = factory(Meetup::class)->create([
            'id' => 1,
        ]);
        
        $response = $this->json('POST', '/api/attendee', [
            'email' => 'guest@tech.com',
            'meetup_id' => 2,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'meetup_id' => [
                        'The selected meetup id is invalid.',
                ]
            ]
        ]);
    }
    
    /**
     * @test
     */
    public function email_and_meetup_id_should_be_unique()
    {
        $email = array('guest@tech.com','guest@tech.com');
        $meetupId = array(3,3);
        
        $response = $this->json('POST', '/api/attendee', [
            'email' => $email,
            'meetup_id' => $meetupId,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'unique_email_meetup_id' => [
                        'The email and meetup_id field already exists.'
                ]
            ]
        ]);
    }


}
