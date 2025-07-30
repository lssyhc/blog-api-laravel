<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $backendUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification())
            ]
        );

        $frontendUrl = config('app.frontend_url') .
            '/verify-email?verify_url=' . urlencode($backendUrl);

        $emailData = [
            'subject'       => 'Verify Your Email Address',
            'fullName'      => $notifiable->fullname,
            'bodyMessage'   => 'Please click the button below to verify your email address and complete your registration.',
            'actionUrl'     => $frontendUrl,
            'actionText'    => 'Verify Email Address',
            'closingMessage' => 'If you did not create an account, no further action is required.'
        ];

        return (new MailMessage)
            ->subject($emailData['subject'])
            ->view('emails.notification', $emailData);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
