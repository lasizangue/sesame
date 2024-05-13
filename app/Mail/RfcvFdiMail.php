<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Rfcv;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RfcvFdiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data=[];
    public $url="http://www.tgr-ci.com";
    /**
     * Create a new message instance.
     */
    public function __construct(Rfcv $rfcv)
    {
        $this->data=$rfcv;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rfcv Fdi Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.rfcvfdis.document',
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
