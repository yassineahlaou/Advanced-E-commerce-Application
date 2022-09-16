<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

        public $invoiceData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoiceData) // this the first thing to execute
    {
        $this->data = $invoiceData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderSummary = $this->data;
        return $this->from('yassineahlaou@gmail.com')->view('frontend.mail.order_mail',compact('orderSummary'))->subject('Email from AHLAOUSHOP');
    }
}
