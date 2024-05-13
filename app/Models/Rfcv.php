<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rfcv extends Model
{
    use HasFactory;

    //Un fdi appartient à un dossier
    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dossier_id',
        'dateRfcvSou',
        'numRfcvSoumi',
        'dateRfcvVal',
        'numRfcvValide',
        'rfcvAnnule',
        'rfcvAnnuleMotif',
        'observRfcv',
        'statut',
        'imageUrl'

    ];
}

 
