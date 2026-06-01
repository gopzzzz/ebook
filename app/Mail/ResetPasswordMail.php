<?php 
use Illuminate\Mail\Mailable;

class ResetPasswordMail extends Mailable
{
    public $resetLink;

    public function __construct($resetLink)
    {
        $this->resetLink = $resetLink;
    }

    public function build()
    {
        return $this->subject('Reset Your Password')
                    ->view('emails.reset-password');
    }
}

?>