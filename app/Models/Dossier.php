<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    //Un dossier appartient à un client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    //Un dossier est coté par un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Un dossier appartient à une compagnie
    public function compagnie()
    {
        return $this->belongsTo(Compagnie::class);
    }

    //Le dossier appartient à un acconier
    public function acconier()
    {
        return $this->belongsTo(Acconier::class);
    }

    //Un dossier peut avoir plusieurs conteneurs
    public function conteneurs()
    {
        return $this->HasMany(Conteneur::class);
    }

    //Un dossier peut avoir plusieurs conteneurs
    public function fdis()
    {
        return $this->HasMany(Fdi::class);
    }


    //Un dossier peut avoir plusieurs rfcvs
    public function rfcvs()
    {
        return $this->HasMany(Rfcv::class);
    }

    //Un dossier est traité par un transporteur
    public function transporteur()
    {
        return $this->belongsTo(Transporteur::class);
    }

    //Un dossier a un buro
    public function buro()
    {
        return $this->belongsTo(Buro::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dateOrdreLivraison',
        'numDossier',
        'typeDossier',
        'modeTransport',
        'regimeDouanier',
        'fournisseur',
        'nbreTc20',
        'nbreTc40',
        'nbreColis',
        'marchandise',
        'connaissement',
        'poidsBrut',
        'danger',
        'dateOuverture',
        'statuCoter',
        'statuValider',
        'statuMisEnLivraison',
        'statuBae',
        'dateBae',
        'nBae',
        'bureauDouane',
        'phyto',
        'statuLivrer',
        'dateLivraison',
        'dateFdiSou',
        'numFdiSoumi',
        'dateFdiVal',
        'numFdiValide',
        'fdiAnnule',
        'fdiAnnuleMotif',
        'observFdi',
        'dateCotation',
        'numDeclaration',
        'numLiquidation',
        'circuit',
        'montanDeclaration',
        'dateValidation',
        'typeChargement',
        'conteneurisation',
        'dateMiseEnLivraison',
        'dateReception',
        'dosMultiDeclaration',
        'bl',
        'observLivraison',
        'navire',
        'port',
        'dateNavire',
        'datePassage',
        'lieu',
        'modeLivraison',
        'modeChargemenAerien',
        'lta',
        'vol',
        'aeroportDepart',
        'dateArrivee',
        'dateBl',
        'user_id',
        'transporteur_id',
        'client_id',
        'compagnie_id',
        'acconier_id',
        'buro_id',
        'nomCompagnie',
        'nomAcconier',
        'terminal',
        'emailouv',
        'emailcota',
        'emailrfcv',
        'emailfdi',
        'emailvalid',
        'emailpass',
        'emailaerien',
        'emailpreliv',
        'emailmiliv',
        'emailliv',
        'okrfcv',
        'okfdi',
        'libClient',
        'imageUrl',
        'agentCotation',
        'dateVisite',
        'verificateur',
        'verifObserv'
       
    ];
}

            
            