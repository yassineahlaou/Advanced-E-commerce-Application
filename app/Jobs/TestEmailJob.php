<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;
use App\Mail\NewPostMail;

class TestEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $subscriber;
    protected $postdata;
    public function __construct($subscriber, $postdata)
    {
        $this->subscriber = $subscriber;
        $this->postdata = $postdata;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new NewPostMail($this->subscriber,$this->postdata);
        Mail::to($this->subscriber['email'])->send($email);
    }
}
