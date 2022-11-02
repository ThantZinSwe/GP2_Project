<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnrollMail extends Mailable
{
    use Queueable, SerializesModels;

    private $enroll;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($enroll)
    {
        $this->enroll = $enroll;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.enroll')->with('enroll', $this->enroll);
    }
}
