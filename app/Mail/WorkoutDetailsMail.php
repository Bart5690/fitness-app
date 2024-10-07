<?php

namespace App\Mail;

use App\Models\Workout;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WorkoutDetailsMail extends Mailable
{
    use Queueable, SerializesModels, InteractsWithQueue;

    public $workout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Workout $workout)
    {
        $this->workout = $workout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Jouw Workout Details')
            ->view('emails.workout-details');
    }
}
