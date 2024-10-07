<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkoutInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    public const SUBJECT_TITLE = 'Workout Info';

    public $workout;

    /**
     * Receive the workout information
     *
     * @param array $workout
     */
    public function __construct(array $workout)
    {
        $this->workout = $workout;
    }

    /**
     * Build the email message
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(self::SUBJECT_TITLE)
            ->view('emails.workout_info')
            ->with('workout', $this->workout);
    }
}
