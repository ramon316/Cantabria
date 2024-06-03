<?php

namespace App\Notifications;

use App\interested;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageInfo extends Notification implements ShouldQueue
{
    use Queueable;

    public $interested;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($interested)
    {
        $this->interested = $interested;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $response = 'Mailto:' . $this->interested['email'];

        return (new MailMessage)
            ->subject("Un futuro cliente te ha hecho un comentario.")
            ->greeting('Has recibido un correo de ' . $this->interested['name'])
            ->line("{$this->interested['message']}")
            ->action('Responder mensaje', $response );
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
            //
        ];
    }
}
