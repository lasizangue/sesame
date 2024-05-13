<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //Un user est délégué par un client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    //Un user peut traiter plusieurs dossiers
    public function dossiers()
    {
        return $this->HasMany(Dossier::class);
    }

    //Un user appartient à un service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    //Un user appartient à un détachement
    public function detachement()
    {
        return $this->belongsTo(Detachement::class);
    }

    //Vérification de détachements user
    public function hasDetachement($detachement)
    {
        return $this->detachement()->where('nomDetachement', $detachement)->first() !== null;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'type',
        'photo',
        'matricule',
        'email',
        'password',
        'client_id',
        'detachement_id',
        'service_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
