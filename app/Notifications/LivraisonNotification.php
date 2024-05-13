<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LivraisonNotification extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($dossier)
    {
        $this->data=$dossier;
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
                    ->line('Les conteneurs du dossier n° '.$this->data['numDossier'].', connaissement n°'.$this->data['connaissement'].' ont été livrés le '.Carbon::parse($this->data['dateLivraison'])->format('d-m-Y').' avec succès' )
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
            'numDossier'=>$this->data['numDossier'],
            'connaissement'=>$this->data['connaissement'],
            'dateLivraison'=>$this->data['dateLivraison'],
        ];
    }
}
