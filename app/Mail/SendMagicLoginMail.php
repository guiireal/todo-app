<?php

namespace App\Mail;

use App\Models\EmailToken;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMagicLoginMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public EmailToken $emailToken)
    {
        //
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Login na plataforma ' . config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.magic-login',
            with: [
                'url' => $this->emailToken->generateMagicLink()
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
