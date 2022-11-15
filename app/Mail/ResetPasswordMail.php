<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * User Collection
     *
     * @param Collection $user
     */
    private $user;
    private $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@admin.com')
        ->markdown('mail/resetPassword')
        ->with(['user' => $this->user, 'token' => $this->token]);
    }
}
