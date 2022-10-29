<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $postdata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postdata)
    {
        $this->data = $postdata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $post_data = $this->data;
        //dd($post_data);
        return $this->from('yassineahlaou@gmail.com')->view('frontend.mail.new_post_mail',compact('post_data'))->subject('Email from AHLAOUSHOP');
    }
}
