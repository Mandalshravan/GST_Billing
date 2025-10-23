<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $random_pass;

    /**
     * Create a new message instance.
     *
     * @param  $user
     * @param  $random_pass
     * @return void
     */
    public function __construct($user, $random_pass)
    {
        $this->user = $user;
        $this->random_pass = $random_pass; 
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Forgot Password Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // Remove this method since you're using 'build()' for content setup.
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name', // Update this to the correct view name (e.g., 'emails.forgot_password')
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.forgot_password') // Use the correct view path
            ->subject(config('app.name') . ', Forgot Password')
            ->with([
                'user' => $this->user,
                'random_pass' => $this->random_pass
            ]);
    }
}
