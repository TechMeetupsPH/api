<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Meetup;

class ListMeetupsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function list_all_meetups()
    {
        $meetup1 = factory(Meetup::class)->create();
        $meetup2 = factory(Meetup::class)->create();
        $meetup3 = factory(Meetup::class)->create();
        
        $response = $this->get('/api/meetup');
        $response->assertStatus(200);

        $response->assertJson([
          $meetup1->toArray(),
          $meetup2->toArray(),
          $meetup3->toArray(),
        ]);
    }
}
