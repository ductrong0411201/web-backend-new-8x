<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NotiCreated extends Notification
{
    public $noti;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($noti)
    {
        $this->noti = $noti;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the voice representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return VoiceMessage
     */
    // public function toOneSignal($notifiable)
    // {
    //     OneSignal::sendNotificationUsingTags("[". $this->Noti->type_name ."]Công việc mới (" . $this->Noti->code .")" , array(["field" => "tag", "relation" => "=", "key" => "user_id","value" => $this->Noti->assignee]), $url = null, 
    //         $data = ['type' => 'Noti_new', 'id' => $this->Noti->id]);              
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'new notification',
            'noti' => $this->noti            
        ];
    }
}
