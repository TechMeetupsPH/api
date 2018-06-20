<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Attendee;

class AttendeeJoinTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function attendee_can_join_meetups()
    {

        $this->withoutExceptionHandling();

        $response = $this->post('/api/attendee', [
            'email' => 'guest@tech.com',
            'meetup_id' => 1
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
    }
}
