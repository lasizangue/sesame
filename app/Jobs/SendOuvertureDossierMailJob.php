<?php

namespace App\Jobs;

use App\Mail\OuvertureDossierMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Dossier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOuvertureDossierMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $dossier;

    /**
     * Create a new job instance.
     */
    public function __construct($user,$dossier)
    {
        $this->user=$user;
        $this->dossier=$dossier;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Envoie du mail
        Mail::to($this->user->email)->send(new OuvertureDossierMail($this->dossier));
    }
}
