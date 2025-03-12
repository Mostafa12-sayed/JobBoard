<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ContactUsNotification extends Notification
{
    use Queueable;

    public $contactForm;

    /**
     * Create a new notification instance.
     *
     * @param  $contactForm
     * @return void
     */
    public function __construct($contactForm)
    {
        $this->contactForm = $contactForm;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast']; // You can add more channels like SMS, Slack, etc.
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Contact Us Submission')
            ->line('You have received a new contact form submission.')
            ->line('Name: ' . $this->contactForm->name)
            ->line('Email: ' . $this->contactForm->email)
            ->line('Message: ' . $this->contactForm->message);
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\DatabaseMessage
     */
    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'contactFormId' => $this->contactForm->id,
            'name' => $this->contactForm->name,
            'message' => $this->contactForm->message,
        ]);
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'contactFormId' => $this->contactForm->id,
            'name' => $this->contactForm->name,
            'message' => $this->contactForm->message,
        ]);
    }
}
