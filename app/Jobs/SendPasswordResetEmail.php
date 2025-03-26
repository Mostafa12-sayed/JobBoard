<?php

namespace App\Jobs;

use App\Mail\PasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;

class SendPasswordResetEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    protected $token;
    /**
     * Create a new job instance.
     */
    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }


    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->email)->send(new PasswordMail($this->token));
    }
}
