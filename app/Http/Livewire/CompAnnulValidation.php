<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Dossier;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CompAnnulValidation extends Component
{
    public $findDossier="";
    public $dossierTrouve=false;
    public $idDossier=0;
    public $idClient=0;
    public $vClient="";
    public $dejaValide=false;
    public $editDossier=[];

    public function render()
    {
        if ($this->findDossier != "") {
            
            $dossier = Dossier::where("numDossier",$this->findDossier)
            ->get();
            $dosier = Dossier::where("numDossier",$this->findDossier)
            ->first();
           
        if ($dossier->count()> 0) {
            $this->dossierTrouve=true;
            $this->idDossier=$dosier->id;
            $this->idClient=$dosier->client_id;
            //
            if($dosier->dateValidation!=""){
                $this->dejaValide=true;
            }else{
                $this->dejaValide=false; 
            } 

        }else{
             $this->dossierTrouve=false;
        } 

        }   

        return view('livewire.anvalids.annul')
            ->extends('layouts.master')
            ->section("contenu");
    }

     public function retour(){
        return redirect()->route(route:'home');

    }

    public function rechercheDossierAannuler(){
       if( $this->findDossier!=""){
             if($this->dossierTrouve==true){
                 if( $this->dejaValide==true){
                        //recherche du libellé client
                     $client=Client::find($this->idClient);
                     $this->vClient=$client["raisonSocial"];
                     $this->editDossier = Dossier::find($this->idDossier)->toArray();
                 }else{
                    $this->dispatchBrowserEvent("showMessNotpossible", ["message" => "Ce dossier n'est pas encore validé ! Merci."]);
                    $this->editDossier=[];
                    $this->vClient="";
                 }
             }else{
                 $this->dispatchBrowserEvent("showSuccesAucun", ["message" => "Aucun enregistrement trouvé !   Merci."]);
                  $this->editDossier=[];
                  $this->vClient="";
             }
       }
    }

     public function rules()
    {
            return [
                'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                'editDossier.typeDossier' => 'nullable',
                'vClient' => 'nullable',
                'editDossier.numDeclaration' => 'nullable',
                'editDossier.numLiquidation' => 'nullable',
                'editDossier.dateValidation' => 'nullable',
                'editDossier.montanDeclaration' => 'nullable',
                'editDossier.circuit' => 'nullable',
            ];
        
    }

     public function annuleValide()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();
        //
        //$validationAttributes["editDossier"]["typeDossier"] ="";
        $validationAttributes["editDossier"]["numDeclaration"] ="";
        $validationAttributes["editDossier"]["numLiquidation"] ="";
        $validationAttributes["editDossier"]["dateValidation"]=null;
        $validationAttributes["editDossier"]["montanDeclaration"] =null;
        $validationAttributes["editDossier"]["circuit"] ="";
        //
        Dossier::find($this->editDossier["id"])->update($validationAttributes['editDossier']);

        $this->findDossier="";
        $this->editDossier=[];
         $this->vClient="";
        //
        $this->dispatchBrowserEvent("showMessageDelete", ["message" => "Annulation de la validation effectuée avec succès !"]);
    }

    public function confirmMessage(){
         if ($this->editDossier!=[]) {
            $numDo=$this->editDossier["numDossier"];
                $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
                    "text" => "Vous êtes sur le point d'annuler la validation du dossier N°$numDo . Voulez-vous continuer ?",
                    "title" => "Êtes-vous sûr de continuer?",
                    "type" => "warning",
                    "data"=>$this->editDossier['id']
                ]]);
            } 
    }

}
