<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RfcvNotification extends Notification
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     */
    public function __construct($rfcv)
    {
        $this->data=$rfcv;
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
                    ->line('Le RFCV numéro soumission : '.$this->data['numRfcvSoumi'].', du dossier n°'.$this->data['dossier']['numDossier'].', connaissement n° '.$this->data['dossier']['connaissement'].' '.' a été établi le '.Carbon::parse($this->data['dateRfcvSou'])->format('d-m-Y').' avec succès' )
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
            'numRfcvSoumi'=>$this->data['numRfcvSoumi'],
            'numDossier'=>$this->data['dossier']['numDossier'],
            'connaissement'=>$this->data['dossier']['connaissement'],
            'dateRfcvSou'=>$this->data['dateRfcvSou'],
        ];
    }
}
