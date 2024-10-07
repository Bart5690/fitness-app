<?php
namespace App\Jobs;
use App\Mail\WorkoutInfoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWorkoutEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $workout;
    protected $userEmail;
    // Ontvang de workout-informatie via de constructor
    public function __construct($workout, $userEmail)
    {
        $this->workout = $workout;
        $this->userEmail = $userEmail;
    }
    // Verwerk de job om de e-mail te verzenden
    public function handle()
    {
        // Verzend de e-mail
        Mail::to($this->userEmail)->send(new WorkoutInfoMail($this->workout));
    }
}
