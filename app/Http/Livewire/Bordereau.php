<?php

namespace App\Http\Livewire;

use App\Jobs\SendMiseEnLivraisonMailJob;
use App\Jobs\SendLivraisonMailJob;
use App\Mail\LivraisonMail;
use App\Mail\MiseEnLivraisonMail;
use App\Models\Acconier;
use App\Models\User;
use App\Models\Compagnie;
use App\Models\Conteneur;
use App\Models\Dossier;
use App\Models\Transporteur;
use App\Notifications\LivraisonNotification;
use App\Notifications\MiseEnLivraisonNotification;
use App\Notifications\PrepaLivraisonNotification;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Livewire\Component;


class Bordereau extends Component
{
    public $search = "";
    public $idDossierRecherche="";
    public $editDossier=[];
    public $currentPage = PAGELIST;
    public $mise="p" ;
    public $dateMiseLivraison ="";
    public $obMiseLivraison;
    public $vTransporteur;
    public $vDateLivraison;
    public $vDateOrdreLivraison;
    public $vDateReception;
    public $vReceptionJour;
    public $vMessage=true;
    public $vMesLivraison=true,$vtypeAcc,$vdateNav=true;
    public $contDossierId=0;
    public $vnomAcconier="";

    public function render()
    {
        $this->vReceptionJour=now()->toDateString('d-m-Y');
        $this->vDateOrdreLivraison=now()->toDateString('d-m-Y');
        $dossierQuery = Dossier::query();
        $conteneurQuery = Conteneur::query();
        $conteneurQuaranteQuery = Conteneur::query();
        $conteneurQuery->where("dossier_id",$this->contDossierId);
        
        if ($this->search != "") {
           
            $dossierQuery->where("numDossier",$this->search);
            return view('livewire.bordereaux.index',[
            "dossier" => $dossierQuery->first(),
            "compagnies" =>Compagnie::all()->sortBy('nomCompagnie'),
            "transporteurs" =>Transporteur::all()->sortBy('nomTransporteur'),
            //
            "conteneurs" => $conteneurQuery->orderBy('created_at','desc')->get(),
            "countV"=> $conteneurQuery->where("dossier_id",$this->contDossierId)
                                      ->where("typeTc","Tc 20'")->count(),
            "countQ"=> $conteneurQuaranteQuery->where("dossier_id",$this->contDossierId)
                                      ->where("typeTc","Tc 40'")->count(),
            "acconiers" => Acconier::where('typeAcconier',$this->vtypeAcc)
            ->orderBy('nomAcconier','asc')
            ->get()

        ])
        ->extends('layouts.master')
        ->section("contenu");
            
        }else{
            $this->vMessage=true;
            $this->vdateNav=true;
            $this->vMesLivraison=true;
             return view('livewire.bordereaux.index',[
            "dossier" => [],
            "compagnies" =>Compagnie::all()->sortBy('nomCompagnie'),
            "transporteurs" =>Transporteur::all()->sortBy('nomTransporteur'),
            "acconiers" => Acconier::where('typeAcconier',$this->vtypeAcc)
            ->orderBy('nomAcconier','asc')
            ->get()
        
        ])
        ->extends('layouts.master')
        ->section("contenu");

        }
        
    }


     public function ficheLvraison($id){
            if ($this->search != "") {
                $this->contDossierId=$id;
                $this->editDossier = Dossier::find($id)->toArray();
                $this->vtypeAcc=$this->editDossier["typeChargement"];

                if($this->editDossier['dateValidation']!=null){
                $this->dateMiseLivraison=$this->editDossier['dateMiseEnLivraison'];
                if($this->editDossier['dateReception']!=""){
                     $this->vDateReception=$this->editDossier['dateReception'];
                }else
                {
                     $this->vDateReception=$this->vReceptionJour;
                }
                $this->vDateOrdreLivraison=$this->editDossier['dateOrdreLivraison'];
                $this->obMiseLivraison=$this->editDossier['observLivraison'];
                $this->vMessage=true;
                //AFFICHAGE DES DONNEES
                
                $this->currentPage = PAGEEDITFORM;
        
                }else{
                    $this->vMessage=false;
                }
            }
    }

    public function ficheMlivraison($id){
            if ($this->search != "") {
                $this->contDossierId=$id;
                $this->editDossier = Dossier::find($id)->toArray();
                $this->vtypeAcc=$this->editDossier["typeChargement"];

                if($this->editDossier['dateNavire']!=null){
                $this->dateMiseLivraison=$this->editDossier['dateMiseEnLivraison'];
                
                $this->obMiseLivraison=$this->editDossier['observLivraison'];
                $this->vdateNav=true;
                //AFFICHAGE DES DONNEES
                
                    $this->currentPage = PAGEEDITFORM;
            
                }else{
                    $this->vdateNav=false;
                }
            }
    }

   
    public function goToEffectuer()
    {
        $this->currentPage = PAGELIST;
        $this->editDossier = [];
        $this->dateMiseLivraison="";
        $this->obMiseLivraison="";
        
    }
    
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
                'editDossier.typeChargement' => 'required',
                'editDossier.transporteur_id' => 'required',
                'editDossier.acconier_id' => 'required',
                'editDossier.terminal' => 'required',
                     
            ];
        }

        if ($this->currentPage == PAGECREATEFORM) {

            return [
                 'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                'editDossier.dateMiseEnLivraison' => 'required',
                'editDossier.connaissement' => 'required',
                
            ];
        }

    }

    public function updateDossier()
    {
        //Recherche du nom acconier avant la validation
        $acconier=Acconier::find($this->editDossier["acconier_id"]);
        $this->vnomAcconier=$acconier->nomAcconier;
        
        //Vérification des informations
        $validationAttributes = $this->validate();
        
        if($this->currentPage == PAGEEDITFORM){

        $validationAttributes["editDossier"]["statuMisEnLivraison"] = 1;
        $validationAttributes["editDossier"]["nomAcconier"] =  $this->vnomAcconier;
         
        if($this->dateMiseLivraison != ""){
            $validationAttributes["editDossier"]["dateMiseEnLivraison"]=$this->dateMiseLivraison;
        }else{
            $validationAttributes["editDossier"]["dateMiseEnLivraison"]=null;
        }

        if($this->vDateOrdreLivraison != ""){
            $validationAttributes["editDossier"]["dateOrdreLivraison"]=$this->vDateOrdreLivraison;
        }else{
            $validationAttributes["editDossier"]["dateOrdreLivraison"]=null;
        }

        if($this->vDateReception != ""){
            $validationAttributes["editDossier"]["dateReception"]=$this->vDateReception;
        }else{
            $validationAttributes["editDossier"]["dateReception"]=null;
        }

        if($this->obMiseLivraison!=""){
            $validationAttributes["editDossier"]["observLivraison"]=$this->obMiseLivraison;
        }else{
            $validationAttributes["editDossier"]["observLivraison"]=null;
        }
        
        Dossier::find($this->editDossier["id"])->update($validationAttributes['editDossier']);

        //Récupération de la mise à jour
        $dossier = Dossier::find($this->editDossier["id"]);

        //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$this->editDossier["client_id"])->first();

       //Dispatching mail
        if (isset($user->email) && $this->dateMiseLivraison==null  && $this->editDossier['dateNavire']!="" && $dossier->emailpreliv==null) {
            $user->notify(new PrepaLivraisonNotification($dossier));
            $dossier->emailpreliv="oui";
            //Save
            $dossier->save();
        }

        //Dispatching mail
        if (isset($user->email) && $this->editDossier['dateNavire']!=null && $this->dateMiseLivraison!=null && $dossier->emailmiliv==null) {
            $user->notify(new MiseEnLivraisonNotification($dossier));
            $dossier->emailmiliv="oui";
            //Save
            $dossier->save();
        }

        //
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Prépa. ou mise en livraison effectuée avec succès !"]);
        //
          if($this->mise=="m"){
            $this->goToEffectuer();
            }

        }

        if($this->currentPage == PAGECREATEFORM){

        if($this->vDateLivraison != ""){
            $validationAttributes["editDossier"]["dateLivraison"]=$this->vDateLivraison;
            $validationAttributes["editDossier"]["statuLivrer"] = 1;
        }else{
            $validationAttributes["editDossier"]["dateLivraison"]=null;
            $validationAttributes["editDossier"]["statuLivrer"] = 1;
        }

        if($this->obMiseLivraison!=""){
            $validationAttributes["editDossier"]["observLivraison"]=$this->obMiseLivraison;
        }else{
            $validationAttributes["editDossier"]["observLivraison"]=null;
        }

        Dossier::find($this->editDossier["id"])->update($validationAttributes['editDossier']);

        //Récupération de la mise à jour
        $dossier = Dossier::find($this->editDossier["id"]);

        //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$this->editDossier["client_id"])->first();

        //
        $this->vDateLivraison="";
        $this->obMiseLivraison="";
        $this->vTransporteur ="";
        $this->goToEffectuer();

        //Dispatching mail
        if (isset($user->email) && $dossier->emailliv==null) {
            $user->notify(new LivraisonNotification($dossier));
            $dossier->emailliv="oui";
            //Save
            $dossier->save();
        }

        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "La livraison a été effectuée avec succès !"]);

        }
        
    }
    //Livraison
    public function livraison($id){
            if ($this->search != "") {

                $this->editDossier = Dossier::find($id)->toArray();

                if($this->editDossier['dateMiseEnLivraison']!=null){
                $this->vDateLivraison=$this->editDossier['dateLivraison'];
                $this->obMiseLivraison=$this->editDossier['observLivraison'];
                
                //AFFICHAGE DES DONNEES
                $this->currentPage = PAGECREATEFORM;
                $this->search="";
                $this->vMesLivraison=true;
                }else{

                    $this->vMesLivraison=false;
                }
               
            }
    }

     public function printPrepa(){
       
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
            $pdf->loadView('livewire.bordereaux.iliste',$data)
            ->setPaper('A4','portrait')
            ->setOption(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true,'defaultFont'=>'courrier','dpi'=>'130'])
             ->setWarnings(false);
             echo $pdf->stream();
        },'prepaLiv.pdf');
        
     }
}
