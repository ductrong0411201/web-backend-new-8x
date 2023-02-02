<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class AttendeeDeleted extends Notification
{
    public $attendee;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($attendee)
    {
        $this->attendee = $attendee;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return array(
            'message' => 'deleted meeting',
            'title' => $this->attendee->meeting->title,
            'meeting_id' => $this->attendee->meeting->id
        );
    }
}
