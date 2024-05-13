<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdi extends Model
{
    use HasFactory;

    //Un rfcv appartient à un dossier
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
        'dateFdiSou',
        'numFdiSoumi',
        'dateFdiVal',
        'numFdiValide',
        'fdiAnnule',
        'fdiAnnuleMotif',
        'observFdi',
        'statut',
        'imageUrl'
    ];
}
