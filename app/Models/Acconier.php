<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acconier extends Model
{
    use HasFactory;

    //Un acconier peut avoir plusieurs dossiers
    public function dossiers()
    {
        return $this->HasMany(Dossier::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomAcconier',
        'typeAcconier',
    ];
}
