<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Attendee;
use App\Meetup;
use App\Mail\AttendeeJoined;

class AttendeeJoinTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function attendee_can_join_meetups()
    {
        $this->withoutExceptionHandling();

        Mail::fake();

        $meetup = factory(Meetup::class)->create();

        $email = 'guest@tech.com';

        $name = 'user';

        $response = $this->post('/api/attendee', [
            'name' => $name,
            'email' => $email,
            'meetup_id' => $meetup->id
        ]);

        Mail::assertSent(AttendeeJoined::class, function ($mail) use ($meetup, $email) {
            return $mail->hasTo($email);
        });

        $attendee = Attendee::where('id', '=', 1)->first();
        $this->assertEquals($attendee->id, 1);
        $this->assertEquals($attendee->name, 'user');
        $this->assertEquals($attendee->email, 'guest@tech.com');
        $this->assertEquals($attendee->meetup_id, 1);

        $response->assertStatus(200); 
        $response->assertJson([
            'attendee' => $attendee->toArray(),
            'meetup' => $meetup->toArray(),
            'is_email_sent' => true,
        ]);
    }
  
    /**
     * @test
     */
    public function attendee_should_join_existing_meetups()
    {
        $meetup = factory(Meetup::class)->create([
            'id' => 1,
        ]);
        
        $response = $this->json('POST', '/api/attendee', [
            'name' => 'user',
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
        $meetup = factory(Meetup::class)->create();

        $email = 'guest@tech.com';
        $meetupId = $meetup->id;

        factory(Attendee::class)->create([
            'email' => $email,
            'meetup_id' => $meetupId,
        ]);

        $response = $this->json('POST', '/api/attendee', [
            'email' => $email,
            'meetup_id' => $meetupId,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'meetup_id' => [
                        'You already joined in this meetup.'
                ]
            ]
        ]);
    }
    
    /**
     * @test
     */
    public function name_field_is_required()
    {
        $meetup = factory(Meetup::class)->create();
        $meetupId = $meetup->id;

        $response = $this->json('POST', '/api/attendee', [
            'email' => 'guest@tech.com',
            'meetup_id' => $meetupId,
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
}
