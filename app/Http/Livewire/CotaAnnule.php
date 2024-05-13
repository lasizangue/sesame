<?php

namespace App\Http\Livewire;

use App\Models\Dossier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CotaAnnule extends Component
{
    
    public $search = "";

    public $editDossier = [];
    public $numDoss="";
    public $cleDos="";
    public $dossierAnnulTrouve =false ;
    public $idDossierAnnul =0 ;

    public function render()
    {
        Carbon::setLocale("fr");

        return view('livewire.cotannuls.index', [
            "dossiers" => Dossier::all(),
            "users" => User::all(),

        ])
            ->extends('layouts.master')
            ->section("contenu");
    }

    public function confirmAnnul(){
        if ($this->search != "") {
            $dossier = Dossier::where("numDossier",$this->search)->get();
            $dosier = Dossier::where("numDossier",$this->search)->first();

            if ($dossier->count() > 0) {
            $this->idDossierAnnul=$dosier->id;
            $this->dossierAnnulTrouve=true;
            $this->editDossier = Dossier::find($this->idDossierAnnul)->toArray();

            $this->numDoss=$this->editDossier["numDossier"];
            $this->cleDos=$this->editDossier["id"];
            
            
            //si dateCotation n'est pas nulle, 
            if ($this->editDossier["dateCotation"] != "") {
                $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
                    "text" => "Vous êtes sur le point d'annuler la cotation du dossier N°$this->numDoss. Voulez-vous continuer?",
                    "title" => "Êtes-vous sûr de continuer?",
                    "type" => "warning",
                    "data"=>$this->cleDos
                ]]);
            } 
           } else {
            $this->dossierAnnulTrouve=false;
            $this->dispatchBrowserEvent("showSuccesAucun", ["message" => "Aucun résultat trouvé !"]); 
        }
        }
    }

     public function rules()

    {

            if ($this->editDossier != []) {
                return [
                    'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                    
                    
                ];
            }
        
    }

    public function annulCotation(){
        //Vérification des informations avant annulation
        $validationAttributes = $this->validate();
        $validationAttributes["editDossier"]["statuCoter"] = 0;
        $validationAttributes["editDossier"]["dateCotation"] = null;
        $validationAttributes["editDossier"]["agentCotation"] = null;
        $validationAttributes["editDossier"]["typeChargement"] ="";

        Dossier::find($this->editDossier['id'])->update($validationAttributes['editDossier']);
        $this->dispatchBrowserEvent("showSuccesMessageAnnul", ["message" => "Annulation effectuée avec succès !"]);
        $this->editDossier = [];
        $this->search = "";
    }

     public function retour(){
    return redirect()->route(route:'home');
    }
}
