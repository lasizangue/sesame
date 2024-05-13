<?php

namespace App\Jobs;

use App\Mail\LivraisonMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Dossier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendLivraisonMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $dossier;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user,Dossier $dossier)
    {
        $this->user=$user;
        $this->dossier=$dossier;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new LivraisonMail($this->dossier));
    }
}
