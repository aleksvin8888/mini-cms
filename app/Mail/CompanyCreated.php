<?php

namespace App\Mail;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyCreated extends Mailable  implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: config('app.name'). ' NEW Company',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.company_created',
            with: [
                'companyName' => $this->company->name,
                'companyEmail' => $this->company->email,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
