<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FdiNotification extends Notification
{
    use Queueable;

    public $data;
    /**
     * Create a new notification instance.
     */
    public function __construct($fdi)
    {
        $this->data=$fdi;
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
                    ->line('La Fdi numéro soumission : '.$this->data['numFdiSoumi'].', du dossier n°'.$this->data['dossier']['numDossier'].', connaissement n° '.$this->data['dossier']['connaissement'].' '.' a été établi le '.Carbon::parse($this->data['dateFdiSou'])->format('d-m-Y').' avec succès' )
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
           'numFdiSoumi'=>$this->data['numFdiSoumi'],
           'numDossier'=>$this->data['dossier']['numDossier'],
           'connaissement'=>$this->data['dossier']['connaissement'],
           'dateFdiSou'=>$this->data['dateFdiSou'],
        ];
    }
}
