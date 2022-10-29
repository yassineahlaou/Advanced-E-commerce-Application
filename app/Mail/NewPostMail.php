<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

   

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $post_data = $this->postdata;
        //dd($post_data);
        return $this->from('yassineahlaou@gmail.com')->view('frontend.mail.new_post_mail',compact('post_data'))->subject('Email from AHLAOUSHOP');
    }
}
