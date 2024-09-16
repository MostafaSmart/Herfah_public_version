<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;
    private $whoseName;
    private $type;
    /**
     * Create a new notification instance.
     */
    public function __construct($name,$type)
    {
        //
        $this->whoseName=$name;
        $this->type=$type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            "Name"=>$this->whoseName,
            "Type"=>$this->type
        ];
    }
}
