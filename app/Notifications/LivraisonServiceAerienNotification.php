<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LivraisonServiceAerienNotification extends Notification
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
                    ->line('Les colis du dossier n° '.$this->data['numDossier'].', LTA : '.$this->data['connaissement'].', Compagnie : '.$this->data['compagnie']['nomCompagnie'].', Vol : '.$this->data['vol'].', Aéroport : '.$this->data['aeroportDepart'].', Arrivé le : '.Carbon::parse($this->data['dateArrivee'])->format('d-m-Y').' vous seront livrés dans les plus brefs délais.')
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
            'nomCompagnie'=>$this->data['compagnie']['nomCompagnie'],
            'vol'=>$this->data['vol'],
            'aeroport'=>$this->data['aeroportDepart'],
            'dateArrivee'=>$this->data['dateArrivee'],
        ];
    }
}
