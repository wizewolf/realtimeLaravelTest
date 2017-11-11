<?php

namespace App\Notifications;

use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\prueba\Entities\User;
class msjNotificaciones extends Notification
{
    use Queueable;
    public $userRecive;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(User $userRecive)
    {
        $this->userRecive = $userRecive;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'userRecive' => $this->$userRecive,
        ];
    }

    public function toBroadcast($notification)
    {
        return new BroadcastManager(
            $this->toArray($notification)
        );
    }
}
