<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeacherPasswordNotification extends Notification
{
    use Queueable;

    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Your account has been created.')
                    ->line('Your password is: ' . $this->password)
                    ->line('Please change your password after logging in.')
                    ->action('Login', url('/login'))
                    ->line('Thank you for using our application!');
    }
}
