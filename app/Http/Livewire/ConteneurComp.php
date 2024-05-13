<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Compagnie;
use App\Models\Conteneur;
use App\Models\Dossier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ConteneurComp extends Component
{
     public $search = "";
     public $libImportateur = "";
     public $libCompagnie = "";
     public $consulDossier = [];
     public $newConteneur = [];
     public $editConteneur = [];
     public $numeroDossier=null;
     public $idClient="";
     public $libClient="";
     public $dateValid=null;
     public $idDossierConteneur;
     public $currentPage = PAGELIST;
     public $nbreTc = 0,$nbreTcVingt=0,$nbreTcQuaran=0,$isListe=false,$nbreTCdossier=0;
     
    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = $this->search;

        $dossierQuery = Dossier::query();
        $contQuery = Conteneur::query();
        $conQQuery = Conteneur::query();

         if ($this->search != "") {

            //Récupération de l'id dossierc
            $dossier=Dossier::where("numDossier",$searchCriteria)->first();
            $idDosFind=$dossier->id ?? 'Not found';
            //Calcul du nombre de TC
            
            $this->nbreTCdossier=$dossier?->nbreTc20 + $dossier?->nbreTc40;
          
            $this->nbreTc=$contQuery->where("dossier_id",$idDosFind)->count();

            $this->nbreTcVingt=$contQuery->where("dossier_id",$idDosFind)
            ->where("typeTc","Tc 20'")
            ->count();

            $this->nbreTcQuaran=$conQQuery->where("dossier_id",$idDosFind)
            ->where("typeTc","Tc 40'")
            ->count();
            
            $dossierQuery->where("numDossier",$searchCriteria);
            return view('livewire.conteneurs.index',[
            "dossiers" => $dossierQuery->get(),
            "conteneurs" => Conteneur::all()])
        ->extends('layouts.master')
        ->section("contenu");
          
        }else{
            return view('livewire.conteneurs.index',[
            "dossiers" => [],
            "conteneurs" =>[]])
        ->extends('layouts.master')
        ->section("contenu");
        }
        
    }

     public function consulterDossier($id){
        
        $this->consulDossier = Dossier::find($id)->toArray();
        //RECHERCHE LIBCLIENT
        $cle_cli=$this->consulDossier['client_id'];
        $clients=Client::find($cle_cli);
        $this->libImportateur=$clients->compteContrib;

       //RECHERCHE LIBCOMPAGNIE
        $cle_compagnie=$this->consulDossier['compagnie_id'];
        $compagnies=Compagnie::find($cle_compagnie);
        $this->libCompagnie=$compagnies->nomCompagnie;

        $this->currentPage = PAGEEDITFORM;
         
    }

    public function goToTableConsul()
    {

        $this->currentPage = PAGELIST;
        $this->consulDossier= [];
    }

    public function retour(){
    return redirect()->route(route:'home');
    }

    public function confirmSaisie(Dossier $dossier){
        
        $this->idDossierConteneur = $dossier->id;
        $this->numeroDossier = $dossier->numDossier;
        $this->idClient= $dossier->client_id;
        $this->libClient= $dossier->libClient;
        $this->dateValid= $dossier->dateValidation;

        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
                    "text" => "Vous êtes sur le point de saisir les conteneurs du dossier N°$this->numeroDossier. Voulez-vous continuer?",
                    "title" => "Êtes-vous sûr de continuer?",
                    "type" => "warning",
                    "data"=>$this->idDossierConteneur
                ]]);

        $this->isListe=true;
    
    }


    public function saisieConteneur(){
        $this->isListe=true;
        $this->currentPage = PAGECREATEFORM;
        
    
    }

     public function rules()
    {
        if ($this->currentPage == PAGEEDITCONT) {

            return [
                'editConteneur.dossier_id' => 'required',
                'editConteneur.numTc' => 'required',
                'editConteneur.typeTc' => 'required',
               
            ];
        }

        return [
                
                'newConteneur.numTc' => 'required',
                'newConteneur.typeTc' => 'required',
                
        ];
    }

    public function addConteneur()
    {
        if($this->nbreTCdossier>0 && $this->nbreTc<$this->nbreTCdossier){
          
            //Vérification des informations
        $validationAttributes = $this->validate();
        $validationAttributes["newConteneur"]["dossier_id"] = $this->idDossierConteneur;
        //
        $validationAttributes["newConteneur"]["client_id"] = $this->idClient;
        $validationAttributes["newConteneur"]["libClient"] = $this->libClient;
        $validationAttributes["newConteneur"]["dateValidation"] = $this->dateValid;
       
        //Ajouter un nouvel conteneur
        Conteneur::create($validationAttributes['newConteneur']);

        //Initialisation du tableau après création
        $this->newConteneur = [];

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        session()->flash('message', 'Conteneur créé avec succès.');
        }else{
             session()->flash('message', 'Le nombre de conteneur est atteint !!! ');
        }
        
    }
    
    public function goToEditConteneur($id)
    {
        $this->editConteneur = Conteneur::find($id)->toArray();
       $this->currentPage = PAGEEDITCONT;
    }

    public function updateConteneur()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();
        Conteneur::find($this->editConteneur["id"])->update($validationAttributes['editConteneur']);
        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        session()->flash('message', 'Conteneur créé avec succès.');
    }

    public function listeConteneur($id){
        
        $this->idDossierConteneur = $id;
        $this->isListe=true;
    
    }

    
    public function confDelete($id,$ntc){
        
        $this->dispatchBrowserEvent("confirmMessageDel", ["message" => [
                    "text" => "Vous êtes sur le point de supprimer le conteneur N°$ntc. Voulez-vous continuer?",
                    "title" => "Êtes-vous sûr de continuer?",
                    "type" => "warning",
                    "data"=>$id
                ]]);
    
    }

    public function deleteCont($id){
        
        Conteneur::destroy($id);
        $this->dispatchBrowserEvent("showSuccesMessageSup", ["message" => "Conteneur supprimé avec succès !"]);
    
    }

     
   
}
