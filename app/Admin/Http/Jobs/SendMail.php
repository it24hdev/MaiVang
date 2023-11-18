<?php

namespace App\Admin\Http\Jobs;

use App\Admin\Http\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $send_mail;
    /**
     * Create a new job instance.
     */
    public function __construct($send_mail)
    {
        $this->send_mail = $send_mail;
    }

    /**
     * Execute the job.
     */

    public function handle(): void
    {
        $email = new TestMail();
        Mail::to($this->send_mail)->send($email);
    }
}
