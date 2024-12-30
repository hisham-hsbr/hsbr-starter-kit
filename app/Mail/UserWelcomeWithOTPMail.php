<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserWelcomeWithOTPMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $userName;
    public $otp;
    public $loginUrl;
    public $verificationUrl;
    public $email;

    public function __construct($userName, $otp, $loginUrl, $email, $verificationUrl)
    {
        $this->userName = $userName;
        $this->otp = $otp;
        $this->loginUrl = $loginUrl;
        $this->verificationUrl = $verificationUrl;
        $this->email = $email;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to HSBR Apps',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'backend.emails.email_welcome_with_otp',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
