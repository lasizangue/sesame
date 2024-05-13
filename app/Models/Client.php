<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    //Un client a plusieurs délégués users
    public function users()
    {
        return $this->HasMany(User::class);
    }

    //Un client a plusieurs dossiers
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
        'raisonSocial',
        'compteContrib',
        'adresse',
        'contact',
    ];
}
