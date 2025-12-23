<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmployeeMessageMail extends Mailable
{
    use Queueable, SerializesModels;


    public $subjectText;
    public $messageText;
    public $priority;
    public $employeeName;


    /**
     * Create a new message instance.
     */
    public function __construct($subjectText, $messageText, $priority, $employeeName)
    {
        $this->subjectText = $subjectText;
        $this->messageText = $messageText;
        $this->priority = $priority;
        $this->employeeName = $employeeName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectText,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.employee-message',
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
