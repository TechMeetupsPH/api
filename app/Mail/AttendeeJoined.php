<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Meetup;
use APp\Attendee;

class AttendeeJoined extends Mailable
{
    use Queueable, SerializesModels;

    protected $attendee;
    protected $meetup;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Meetup $meetup, Attendee $attendee)
    {
        $this->attendee = $attendee;
        $this->meetup = $meetup;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Techmeetups PH - Registration Successful: " . $this->meetup->title;
        return $this->from('no-reply@techmeetups.ph.com')
                    ->subject($subject)
                    ->view('emails.attendee.joined')
                    ->with([
                        'name' => $this->attendee->name,
                        'email' => $this->attendee->email,
                        'title' => $this->meetup->title,
                        'start_date' => $this->meetup->getFormattedStartDate(),
                        'end_date' => $this->meetup->getFormattedEndDate(),
                        'address' => $this->meetup->address,
                        'city' => $this->meetup->city 
                    ]);
    }
}
