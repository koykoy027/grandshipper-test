<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OTPLogin extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $firstname;

    /**
     * Create a new message instance.
     */
    public function __construct($otp, $firstname)
    {
        $this->otp = $otp;
        $this->firstname = $firstname;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your OTP Login',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'vendor.otp_login',
            with: [
                'otp' => $this->otp,
                'firstname' => $this->firstname,
            ],
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
