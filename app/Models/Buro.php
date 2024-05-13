<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buro extends Model
{
    use HasFactory;

     //Un buro peut avoir plusieurs dossiers
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
        'code',
        'libelle',
    ];
}
