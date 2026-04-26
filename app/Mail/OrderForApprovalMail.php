<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderForApprovalMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $approvalStage;
    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, string $approvalStage = 'department')
    {
        $this->order = $order;
        $this->approvalStage = $approvalStage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->approvalStage === 'security_manager'
            ? 'طلب زيارة بانتظار موافقة مدير الأمن'
            : 'طلب زيارة جديد بانتظار الموافقة';

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order-for-approval',
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
