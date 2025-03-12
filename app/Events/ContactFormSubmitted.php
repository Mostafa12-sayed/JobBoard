<?php

namespace App\Events;

use App\Models\ContactUs;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contactForm;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contactForm)
    {
        $this->contactForm = $contactForm;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|PresenceChannel
     */
    public function broadcastOn()
    {

        return ['contact-form'];
    }

    /**
     * The name of the event.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'contact-submitted';
    }
    public function broadcastWith()
    {
        // dd($contactForm);

        return [
            'name' => $this->contactForm->name,
            'message' => $this->contactForm->message,
            'notifyCreatedAt' => $this->contactForm->created_at->diffForHumans(),
            'contactFormId' => $this->contactForm->id,
            'notifyId' => $this->contactForm->id, // Can be the notification ID or form ID
        ];
    }
}
