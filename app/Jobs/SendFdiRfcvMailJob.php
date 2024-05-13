<?php

namespace App\Jobs;

use App\Mail\FdiRfcvMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Fdi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendFdiRfcvMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $fdi;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user,Fdi $fdi)
    {
        $this->user=$user;
        $this->fdi=$fdi;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new FdiRfcvMail($this->fdi));
    }
}
