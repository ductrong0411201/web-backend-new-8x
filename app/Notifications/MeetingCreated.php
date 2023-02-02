<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class MeetingCreated extends Notification
{
    public $meeting;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($meeting)
    {
        $this->meeting = $meeting;
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
            'message' => 'New meeting',
            'title' => $this->meeting->title,
            'meeting_id' => $this->meeting->id
        );
    }
}
