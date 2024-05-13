<?php

namespace App\Http\Livewire;

use App\Models\Conteneur;
use App\Models\Dossier;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CompOrdre extends Component
{
    public $currentPage = PAGELIST;
    public $search = "";
    public $editDossier=[];
    public $vMessage=true;
    public $libClient="";
    public $libCompagnie="";
    public $contDossierId=0;
    public $vTypeChargement="";
   
    public function render()
    {
        Carbon::setLocale("fr");
         $dossierQuery = Dossier::query();
         $conteneurQuery = Conteneur::query();
         $conteneurQuaranteQuery = Conteneur::query();
         //
          $this->vMessage=true;
          $conteneurQuery->where("dossier_id",$this->contDossierId);
        //if ($this->search != "") {
        $dossierQuery->where("numDossier",$this->search);
        return view('livewire.ordres.index',[
            "dossier" => $dossierQuery->first(),
            //
            "conteneurs" => $conteneurQuery->orderBy('created_at','desc')->get(),
            "countV"=> $conteneurQuery->where("dossier_id",$this->contDossierId)
                                      ->where("typeTc","Tc 20'")->count(),
            "countQ"=> $conteneurQuaranteQuery->where("dossier_id",$this->contDossierId)
                                      ->where("typeTc","Tc 40'")->count()
            
        ])
        ->extends('layouts.master')
        ->section("contenu");
         /*}else{
            
             $this->vMessage=true;
             $conteneurQuery->where("dossier_id",$this->contDossierId);
             return view('livewire.ordres.index',[
            "dossier" => [],
            "conteneurs" => $conteneurQuery->orderBy('created_at','desc')->get(),
            "countV"=> $conteneurQuery->where("dossier_id",$this->contDossierId)
                                      ->where("typeTc","Tc 20'")->count(),
            "countQ"=> $conteneurQuaranteQuery->where("dossier_id",$this->contDossierId)
                                      ->where("typeTc","Tc 40'")->count()
                                   
        ])
        ->extends('layouts.master')
        ->section("contenu");

        }*/
    }

     public function retour(){

        return redirect()->route(route:'home');
    }

    public function findDossier($id){
             //recherche des conteneurs
                $this->contDossierId=$id;
            //if ($this->search != "") {
                //recherche dossier
                $dosssier=Dossier::find($id);
                $this->editDossier = Dossier::find($id)->toArray();
                if($this->editDossier['dateMiseEnLivraison']!=null){
                $this->vMessage=true;
                $this->vTypeChargement=$dosssier->typeChargement;
                $this->libClient=$dosssier->client->raisonSocial;
                $this->libCompagnie=$dosssier->compagnie->nomCompagnie;
                //AFFICHAGE DES DONNEES
                $this->currentPage = PAGEEDITFORM;
                //$this->search="";
                }else{
                    $this->vMessage=false;
                }
            //}
    }

     public function goToFind()
    {
        $this->currentPage = PAGELIST;
        $this->editDossier = [];
    }
    //
    //
    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                 'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                'editDossier.compagnie_id' => 'required',
                'editDossier.navire' => 'required',
                'editDossier.dateNavire' => 'required',
                'editDossier.modeLivraison' => 'required',
                'editDossier.port' => 'required',
                'editDossier.lieu' => 'required',
                     
            ];
        }

        if ($this->currentPage == PAGECREATEFORM) {

            return [
                 'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                'editDossier.dateMiseEnLivraison' => 'required',
                
            ];
        }
    }

    //
    //
    public function imprimeOrdre(){
       
        return response()->streamDownload(function () {
            Carbon::setLocale("fr");
            $dossierQuery = Dossier::query();
            $conteneurQuery = Conteneur::query();
            $conteneurQuaranteQuery = Conteneur::query();
            //
            //if ($this->search != "") {
            $dossierQuery->where("numDossier",$this->search);
            $conteneurQuery->where("dossier_id",$this->contDossierId);
           
            //}
            //
            $data=[
            'dateEnChaine'=>now()->toDateString('d-m-Y'),
            'dateHeureActu'=>Carbon::now()->isoFormat('LLLL'), //date en lettres(un L enlevé efface le jour, un autre efface l'heure)
            'dateHeureA'=>Carbon::now()->isoFormat('LL'),
            "dossier" =>$dossierQuery->first(),
            "conteneurs" => $conteneurQuery->orderBy('created_at','desc')->get(),
            "countV"=> $conteneurQuery->where("dossier_id",$this->contDossierId)
                                      ->where("typeTc","Tc 20'")->count(),
            "countQ"=> $conteneurQuaranteQuery->where("dossier_id",$this->contDossierId)
                                      ->where("typeTc","Tc 40'")->count(),
             
            ];
           
            $pdf = App::make('dompdf.wrapper');
            //pour la numerotation des pages
            $pdf->getDomPDF()->set_option("enable_php", true);
            //
            $pdf->loadView('livewire.ordres.iliste',$data)
            ->setPaper('A4','portrait')
            ->setOption(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true,'defaultFont'=>'courrier','dpi'=>'130'])
             ->setWarnings(false);
             echo $pdf->stream();
        },'ordreLiv.pdf');
        
     }
}
