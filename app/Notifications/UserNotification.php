<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class UserNotification extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->data=$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Bienvenu(e) '.$this->data['prenom'].' '.$this->data['nom'].' sur la plateforme de TGR.')
                    ->line('Merci de noter vos accès : ')
                    ->line('Email ou UserName : '.$this->data['email'])
                    ->line('Mot de passe : password ')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'prenom'=>$this->data['prenom'],
            'nom'=>$this->data['nom'],
            'email'=>$this->data['email'],
            'password'=>$this->data['password'],
        ];
    }
}
