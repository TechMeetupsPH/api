<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Meetup;

class GetFormattedEndDateTest extends TestCase
{
    /**
     * @test
     */
    public function test_get_formatted_end_date()
    {
        $meetup = new Meetup();
        $meetup->end_date = "2018-07-21 14:00:00";
        $this->assertEquals($meetup->getFormattedEndDate(), "Saturday July 21, 2018 - 02:00 pm");
    }
}
