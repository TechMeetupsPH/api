<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Meetup;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function display_home_page()
    {
        $meetup1 = factory(Meetup::class)->create();
        $meetup2 = factory(Meetup::class)->create();
        $meetup3 = factory(Meetup::class)->create();

        $this->withoutExceptionHandling();

        $response = $this->get('/home');
        $response->assertStatus(200);
        $response->assertViewHas('meetups', Meetup::all());
        $response->assertViewIs('home');

        $response->assertSeeText($meetup1->title);
        $response->assertSeeText($meetup2->title);
        $response->assertSeeText($meetup3->title);
    }
}
