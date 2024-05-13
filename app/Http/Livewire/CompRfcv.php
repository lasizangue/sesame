<?php

namespace App\Http\Livewire;

use App\Jobs\SendFdiRfcvMailJob;
use App\Jobs\SendRfcvFdiMailJob;
use App\Mail\FdiRfcvMail;
use App\Mail\RfcvFdiMail;
use App\Models\Dossier;
use App\Models\User;
use App\Models\Fdi;
use App\Models\Rfcv;
use App\Notifications\FdiNotification;
use App\Notifications\RfcvNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Symfony\Component\Console\SingleCommandApplication;
use Illuminate\Support\Facades\Mail;

class CompRfcv extends Component
{
    use WithPagination, WithFileUploads;

    public $currentPage = PAGELIST;
    public $search ="";
    public $editRfcv = [];
    public $rfcvSoumi = false;
    public $rfcvValide = false;
    public $rfcvAnnul=false;
    public $newRfcv=[];
    public $vDateRfcvSou=null;
    public $vNumRfcvSoumi="";
    public $vDossier_id="";
    public $vObservRfcv="";
    public $rfcvCreate=false;
    public $rfcvFdi="";
    public $statut="Non validé" ;
    public $idDossierRfcv=null;
    public $ajoutButton=false;
    public $editHasChanged;
    public $editRfcvOldValues=[];
    public $valHasChanged=false;
    public $anHasChanged=false;
    public $vDateFdiSou=null;
    public $vNumFdiSoumi="";
    public $vDossier_id_fdi="";
    public $vObservFdi="";
    public $statut_fdi="Non validé";
    public $ajoutButtonFdi=false;
    public $fdiCreate=false;
    public $fdiSoumi=false;
    public $fdiValide = false;
    public $fdiAnnul = false;
    public $newFdi = [];
    public $editFdi=[];
    public $editFdiOldValues=[];
    public $editFdiHasChanged=false;
    public $anFdiHasChanged=false;
    public $valFdiHasChanged=false;
    public $vClient_id=0;
    public $showButtonFdi=false;
    public $showButtonRfcv=false;
    
    public function render()
    {
        Carbon::setLocale("fr");
        $searchCriteria = $this->search;
        $dossier=Dossier::where('numDossier', $searchCriteria)->first();
        $this->idDossierRfcv=$dossier->id ?? 'Code not found';
        
        $rfcvQuery = Rfcv::query();
        $fdiQuery = Fdi::query();
        
        if ($this->search != "") {
            $rfcvQuery->where("dossier_id","LIKE",$this->idDossierRfcv);
            $fdiQuery->where("dossier_id","LIKE",$this->idDossierRfcv);
        }
        
        if($this->editRfcv!=[]){
            $this->showUpdateButton();
        }

        if($this->editFdi!=[]){
            $this->showUpdateButtonFdi();
        }

            $this->showAjoutButton();
            $this->showAjoutButtonFdi();

         return view('livewire.rfcvs.index',[
            "dossier" =>$dossier,
            "dossiers" =>Dossier::orderBy('numDossier','desc')->get(),
            "rfcvs" => $rfcvQuery->orderBy('dateRfcvSou','desc')->get(), 
            "fdis" => $fdiQuery->orderBy('dateFdiSou','desc')->get(), 
        ])
        ->extends('layouts.master')
        ->section("contenu");
    
    }

    function showUpdateButton(){
        if($this->rfcvSoumi==true){
                $this->editHasChanged=false;
                if($this->editRfcv["dossier_id"] != $this->editRfcvOldValues["dossier_id"] ||
                $this->editRfcv["dateRfcvSou"] != $this->editRfcvOldValues["dateRfcvSou"] ||
                $this->editRfcv["numRfcvSoumi"] != $this->editRfcvOldValues["numRfcvSoumi"] ||
                $this->editRfcv["observRfcv"] != $this->editRfcvOldValues["observRfcv"] ||
                $this->editRfcv["statut"] != $this->editRfcvOldValues["statut"]
                 ){
                    $this->editHasChanged = true;
                }
            }

            if($this->rfcvValide == true){
                $this->valHasChanged=false;
                if($this->editRfcv["dateRfcvVal"] != $this->editRfcvOldValues["dateRfcvVal"] ||
                $this->editRfcv["statut"] != $this->editRfcvOldValues["statut"] ||
                $this->editRfcv["numRfcvValide"] != $this->editRfcvOldValues["numRfcvValide"]
                ){
                    $this->valHasChanged = true;
                }
            }

            if($this->rfcvAnnul == true){
                $this->anHasChanged=false;
                if($this->editRfcv["rfcvAnnuleMotif"] != $this->editRfcvOldValues["rfcvAnnuleMotif"] ||
                $this->editRfcv["statut"] != $this->editRfcvOldValues["statut"]
                ){
                    $this->anHasChanged = true;
                }
            }
    }

     function showUpdateButtonFdi(){
        if($this->fdiSoumi==true){
                $this->editFdiHasChanged=false;
                if($this->editFdi["dossier_id"] != $this->editFdiOldValues["dossier_id"] ||
                $this->editFdi["dateFdiSou"] != $this->editFdiOldValues["dateFdiSou"] ||
                $this->editFdi["numFdiSoumi"] != $this->editFdiOldValues["numFdiSoumi"] ||
                $this->editFdi["observFdi"] != $this->editFdiOldValues["observFdi"] ||
                $this->editFdi["statut"] != $this->editFdiOldValues["statut"] ){
                    $this->editFdiHasChanged = true;
                }else{
                    $this->editFdiHasChanged = false;
                }
            }

            if($this->fdiValide == true){
                $this->valFdiHasChanged=false;
                if($this->editFdi["dateFdiVal"] != $this->editFdiOldValues["dateFdiVal"] ||
                $this->editFdi["statut"] != $this->editFdiOldValues["statut"]
                ){
                    $this->valFdiHasChanged = true;
                }
            }

            if($this->fdiAnnul == true){
                $this->anFdiHasChanged=false;
                if($this->editFdi["fdiAnnuleMotif"] != $this->editFdiOldValues["fdiAnnuleMotif"] ||
                $this->editFdi["statut"] != $this->editFdiOldValues["statut"]
                ){
                    $this->anFdiHasChanged = true;
                }
            }
    }

    function showAjoutButton(){
        $this->ajoutButton=false;
        if($this->vDossier_id!="" &&
        $this->vDateRfcvSou!=null &&
        $this->vNumRfcvSoumi!="" ){
            $this->ajoutButton=true;
        }else{
            $this->ajoutButton=false;
        }
    }

    function showAjoutButtonFdi(){
        $this->ajoutButtonFdi=false;
        if($this->vDossier_id_fdi!="" &&
        $this->vDateFdiSou!=null &&
        $this->vNumFdiSoumi!="" ){
            $this->ajoutButtonFdi=true;
        }else{
            $this->ajoutButtonFdi=false;
        }
    }

    public function rfcvSoumi($id){
       $this->editRfcv = Rfcv::find($id)->toArray();
       $this->rfcvSoumi = true;
       $this->rfcvValide = false;
       $this->rfcvAnnul = false;
       $this->rfcvCreate=false;
       //
       $this->fdiSoumi = false;
       $this->fdiValide = false;
       $this->fdiAnnul = false;
       $this->fdiCreate=false;
       //recupère les anciennes valeurs
       $this->editRfcvOldValues=$this->editRfcv;
       //
       $this->currentPage = PAGEEDITFORM;
    }

    public function fdiSoumi($id){
       $this->editFdi = Fdi::find($id)->toArray();
       $this->fdiSoumi = true;
       $this->fdiValide = false;
       $this->fdiAnnul = false;
       $this->fdiCreate=false;
       //
       $this->rfcvSoumi = false;
       $this->rfcvValide = false;
       $this->rfcvAnnul = false;
       $this->rfcvCreate=false;
       //recupère les anciennes valeurs
       $this->editFdiOldValues=$this->editFdi;
       //
       $this->currentPage = PAGEEDITFORM;
    }

     public function rfcvValide($id){
       $this->editRfcv = Rfcv::find($id)->toArray();
       $this->rfcvValide = true;
       $this->rfcvSoumi = false;
       $this->rfcvAnnul = false;
       $this->rfcvCreate=false;
       //
       $this->fdiValide = false;
       $this->fdiSoumi = false;
       $this->fdiAnnul = false;
       $this->fdiCreate=false;
       //recupère les anciennes valeurs
       $this->editRfcvOldValues=$this->editRfcv;
       $this->currentPage = PAGEEDITFORM; 
    }

    public function fdiValide($id){
       $this->editFdi = Fdi::find($id)->toArray();
       $this->fdiValide = true;
       $this->fdiSoumi = false;
       $this->fdiAnnul = false;
       $this->fdiCreate=false;
       //
       $this->rfcvSoumi = false;
       $this->rfcvValide = false;
       $this->rfcvAnnul = false;
       $this->rfcvCreate=false;
       //recupère les anciennes valeurs
       $this->editFdiOldValues=$this->editFdi;
       $this->currentPage = PAGEEDITFORM; 
    }

     public function rfcvAnnul($id){
       $this->editRfcv = Rfcv::find($id)->toArray();
       $this->rfcvAnnul = true;
       $this->rfcvValide = false;
       $this->rfcvSoumi = false;
       $this->rfcvCreate=false;
       //
       $this->fdiSoumi = false;
       $this->fdiValide = false;
       $this->fdiAnnul = false;
       $this->fdiCreate=false;
       //recupère les anciennes valeurs
       $this->editRfcvOldValues=$this->editRfcv;
       $this->currentPage = PAGEEDITFORM; 
    }

    public function fdiAnnul($id){
       $this->editFdi = Fdi::find($id)->toArray();
       $this->fdiAnnul = true;
       $this->fdiValide = false;
       $this->fdiSoumi = false;
       $this->fdiCreate=false;
       //
       $this->rfcvSoumi = false;
       $this->rfcvValide = false;
       $this->rfcvAnnul = false;
       $this->rfcvCreate=false;
       //recupère les anciennes valeurs
       $this->editFdiOldValues=$this->editFdi;
       $this->currentPage = PAGEEDITFORM; 
    }

    public function retour(){

       $this->currentPage = PAGELIST;
       $this->rfcvSoumi = false;
       $this->rfcvValide = false;
       $this->rfcvAnnul = false;
       $this->rfcvCreate=false;
       //
       $this->fdiSoumi = false;
       $this->fdiValide = false;
       $this->fdiAnnul = false;
       $this->fdiCreate=false;
       
    }

    public function ajoutRfcv(){
        $this->showButtonRfcv=true;
        $this->rfcvCreate=true;
        $this->rfcvSoumi = false;
        $this->rfcvValide = false;
        $this->rfcvAnnul = false;
        $this->vDateRfcvSou=now()->toDateString('Y-m-d');
        //
        $this->fdiCreate=false;
        $this->fdiSoumi = false;
        $this->fdiValide = false;
        $this->fdiAnnul = false;
       
    }

    public function ajoutFdi(){
        $this->showButtonFdi=true;
        $this->fdiCreate=true;
        $this->fdiSoumi = false;
        $this->fdiValide = false;
        $this->fdiAnnul = false;
        $this->vDateFdiSou=now()->toDateString('Y-m-d');
        //
        $this->rfcvCreate=false;
        $this->rfcvSoumi = false;
        $this->rfcvValide = false;
        $this->rfcvAnnul = false;
       
    }

     public function rules()
    {
        if ($this->rfcvCreate==true) {
            return [
            'vDossier_id' => 'required',
            'vDateRfcvSou' => 'required',
            'vNumRfcvSoumi' => 'required',
        ];
        }

        if ($this->fdiCreate==true) {
            return [
            'vDossier_id_fdi' => 'required',
            'vDateFdiSou' => 'required',
            'vNumFdiSoumi' => 'required',
           
        ];
        }

        if ($this->rfcvSoumi == true ||
        $this->rfcvValide == true ||
        $this->rfcvAnnul == true){
            return [
            'editRfcv.dossier_id' => 'required',
            'editRfcv.dateRfcvSou' => 'required',
            'editRfcv.numRfcvSoumi' => 'required',
            'editRfcv.dateRfcvVal' => 'nullable',
            'editRfcv.rfcvAnnuleMotif' => 'nullable',
            'editRfcv.observRfcv' => 'nullable',
            'editRfcv.statut' => 'nullable',
            
        ];
        }

        if ($this->fdiSoumi == true ||
        $this->fdiValide == true ||
        $this->fdiAnnul == true){
            return [
            'editFdi.dossier_id' => 'required',
            'editFdi.dateFdiSou' => 'required',
            'editFdi.numFdiSoumi' => 'required',
            'editFdi.dateFdiVal' => 'nullable',
            'editFdi.fdiAnnuleMotif' => 'nullable',
            'editFdi.observFdi' => 'nullable',
            'editFdi.statut' => 'nullable',
           
        ];
        }
           
    }


    public function addRfcv()
    {
       
        $this->showButtonRfcv=false;
        //insertion des informations
        $validationAttributes["newRfcv"]["dossier_id"] =$this->vDossier_id;
        $validationAttributes["newRfcv"]["dateRfcvSou"] =$this->vDateRfcvSou ;
        $validationAttributes["newRfcv"]["numRfcvSoumi"] =$this->vNumRfcvSoumi ;
        $validationAttributes["newRfcv"]["observRfcv"] =$this->vObservRfcv ;
        $validationAttributes["newRfcv"]["statut"] =$this->statut;
       
        //$validationAttributes["newRfcv"]["observRfcv"] =$this->vObservRfcv ;

        //Ajouter un nouvel détachement
        $rfcv=Rfcv::create($validationAttributes['newRfcv']);

        //Recupération du dossier
        $dossier = Dossier::find($this->vDossier_id);
        $this->vClient_id=$dossier->client_id;

        //Mise à jour de la clé Rfcv
        $dossier->okrfcv="o";
        $dossier->save();

        //Initialisation du tableau après création
        $this->newRfcv = [];
        $this->vObservRfcv="";
        $imagePath=null;
        $this->rfcvCreate=false;
        $this->vDossier_id="";
        $this->vDateRfcvSou=null;
        $this->vNumRfcvSoumi="";
       
        //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$this->vClient_id)->first();

        //Dispatching the mail
        if (isset($user->email) && $dossier->emailrfcv==null) {
            $user->notify(new RfcvNotification($rfcv));
            $dossier->emailrfcv="oui";
            //Save
            $dossier->save();
        }

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showMessageCreate", ["message" => "RFCV créé avec succès !"]);
    }

    public function updateRfcv(){
        $this->validate();
        
        //Mise à jour des valeurs
        $rfcv = Rfcv::find($this->editRfcv["id"]);

        $rfcv->fill($this->editRfcv);

       if ($this->editRfcv["dateRfcvVal"]==null) {
           $rfcv->dateRfcvVal=null;
        }else{
           $rfcv->dateRfcvVal=$this->editRfcv["dateRfcvVal"];
        }

        $rfcv->save();

        $this->dispatchBrowserEvent("showMessageEdit", ["message" => "RFCV mis à jour avec succès !"]);

        $this->retour();
    }

     public function addFdi()
    {
        $this->showButtonFdi=false;
        $validationAttributes = $this->validate();
       
        //insertion des informations
        $validationAttributes["newFdi"]["dossier_id"] =$this->vDossier_id_fdi ;
        $validationAttributes["newFdi"]["dateFdiSou"] =$this->vDateFdiSou ;
        $validationAttributes["newFdi"]["numFdiSoumi"] =$this->vNumFdiSoumi;
        $validationAttributes["newFdi"]["observFdi"] =$this->vObservFdi ;
        $validationAttributes["newFdi"]["statut"] =$this->statut_fdi;
       
        //$validationAttributes["newRfcv"]["observRfcv"] =$this->vObservRfcv ;

        //Ajouter un nouvel détachement
        $fdi=Fdi::create($validationAttributes['newFdi']);

        //Recupération du dossier
        $dossier = Dossier::find($this->vDossier_id_fdi);
        $this->vClient_id=$dossier->client_id;

        //Mise à jour de la clé Fdi
        $dossier->okfdi="o";
        $dossier->save();

        //Initialisation du tableau après création
        $this->newFdi = [];
        $this->vObservFdi="";
        $this->fdiCreate=false;
        $this->vDossier_id_fdi="";
        $this->vDateFdiSou=null;
        $this->vNumFdiSoumi="";
       
        //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$this->vClient_id)->first();

        //Dispatching the mail
        if (isset($user->email) && $dossier->emailfdi==null) {
            $user->notify(new FdiNotification($fdi));
            $dossier->emailfdi="oui";
            //Save
            $dossier->save();
        }

         //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showMessageCreateFdi", ["message" => "FDI créé avec succès !"]);


    }

    public function updateFdi(){
         $this->validate();

        $fdi = Fdi::find($this->editFdi["id"]);

        $fdi->fill($this->editFdi);

        if ($this->editFdi["dateFdiVal"]==null) {
           $fdi->dateFdiVal=null;
        }else{
           $fdi->dateFdiVal=$this->editFdi["dateFdiVal"];
        }


        $fdi->save();
           
        $this->dispatchBrowserEvent("showMessageEditFdi", ["message" => "FDI mis à jour avec succès !"]);

        $this->retour();
    }

    public function razRfcv(){
        $this->showButtonRfcv=false;
        $this->newRfcv = [];
        $this->vObservRfcv="";
        $this->rfcvCreate=false;
        $this->vDossier_id="";
        $this->vDateRfcvSou=null;
        $this->vNumRfcvSoumi="";
        $this->currentPage = PAGELIST;
        
    }

    public function razFdi(){
        $this->showButtonFdi=false;
        $this->newFdi = [];
        $this->vObservFdi="";;
        $this->fdiCreate=false;
        $this->vDossier_id_fdi="";
        $this->vDateFdiSou=null;
        $this->vNumFdiSoumi="";
        $this->currentPage = PAGELIST;
    }

    public function rfcvConfDelete(Rfcv $rfcv){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer le rfcv n° ".$rfcv->numRfcvSoumi." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "rfcv_id"=>$rfcv->id
            ]
        ]]);
    }

    public function deleteRfvc(Rfcv $rfcv){
        //Recupération du dossier
        $dossier = Dossier::find($rfcv->dossier_id);

        //Mise à jour du dossier
        $dossier->okrfcv="";
        $dossier->save();

        $rfcv->delete();
        $this->dispatchBrowserEvent("showMessageDeleteRfcv", ["message" => "RFCV supprimé avec succès !"]);
    }

    public function fdiConfDelete(Fdi $fdi){
        $this->dispatchBrowserEvent("showConfirmMessageFdi", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer la FDI n° ".$fdi->numFdiSoumi." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "fdi_id"=>$fdi->id
            ]
        ]]);
    }

    public function deleteFdi(Fdi $fdi){
        //Recupération du dossier
        $dossier = Dossier::find($fdi->dossier_id);

        //Mise à jour du dossier
        $dossier->okfdi="";
        $dossier->save();

        //supprime la fdi
        $fdi->delete();
        //
        $this->dispatchBrowserEvent("showMessageDeleteFdi", ["message" => "FDI supprimé avec succès !"]);
    }

    public function retourAccueil(){
    return redirect()->route(route:'home');
    }

}

