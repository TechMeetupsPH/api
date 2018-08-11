<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Meetup extends Model
{
    protected $table = 'meetup';
    public $timestamps = false;

    public function getStartDateForDashboardAttribute()
    {
        $startDate = Carbon::parse($this->start_date);
        return $startDate->format('F d, Y');
    }

    public function getFormattedEndDate()
    {
        $endDate = Carbon::parse($this->end_date);
        return $endDate->format('l F d, Y - h:i a');
    }

    public function getFormattedStartDate()
    {
        $startDate = Carbon::parse($this->start_date);
        return $startDate->format('l F d, Y - h:i a');
    }
}
