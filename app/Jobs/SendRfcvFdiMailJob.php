<?php

namespace App\Jobs;

use App\Mail\RfcvFdiMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Rfcv;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRfcvFdiMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $rfcv;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user,Rfcv $rfcv)
    {
        $this->user=$user;
        $this->rfcv=$rfcv;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new RfcvFdiMail($this->rfcv));
    }
}
