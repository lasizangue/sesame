<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteneur extends Model
{
    use HasFactory;

    //Une ligne de conteneur est liée à un dossier
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
        'numTc',
        'typeTc',
        'dossier_id',
        'client_id',
        'libClient',
        'dateValidation'
    ];
}
