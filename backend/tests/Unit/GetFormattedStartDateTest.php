<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Meetup;

class GetFormattedStartDateTest extends TestCase
{
    /**
     * @test
     */
    public function test_get_formatted_start_date()
    {
        $meetup = new Meetup();
        $meetup->start_date = "2018-07-21 14:00:00";
        $this->assertEquals($meetup->getFormattedStartDate(), "Saturday July 21, 2018 - 02:00 pm");
    }
}
