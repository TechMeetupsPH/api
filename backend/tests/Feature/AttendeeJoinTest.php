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

        $response = $this->post('/api/attendee', [
            'email' => $email,
            'meetup_id' => $meetup->id
        ]);

        Mail::assertSent(AttendeeJoined::class, function ($mail) use ($meetup, $email) {
            return $mail->hasTo($email);
        });

        $attendee = Attendee::where('id', '=', 1)->first();
        $this->assertEquals($attendee->id, 1);
        $this->assertEquals($attendee->email, 'guest@tech.com');
        $this->assertEquals($attendee->meetup_id, 1);

        $response->assertStatus(200); 
        $response->assertJson([
            'attendee' => $attendee->toArray(),
            'meetup' => $meetup->toArray(),
            'is_email_sent' => true
        ]);
    }
}
