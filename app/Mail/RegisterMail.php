<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $user_coupon;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $user_coupon)
    {
        $this->user = $user;
        $this->user_coupon = $user_coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.register')->with(['user'=> $this->user, 'user_coupon' => $this->user_coupon]);
    }
}
