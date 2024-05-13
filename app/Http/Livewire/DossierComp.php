<?php

namespace App\Http\Livewire;

use App\Helpers\LogActivity;
use App\Jobs\SendOuvertureDossierMailJob;
use App\Mail\OuvertureDossierMail;
use App\Mail\TestMail;
use App\Models\User;
use App\Models\Client;
use App\Models\Compagnie;
use App\Models\Dossier;
use App\Notifications\OuvertureNotification;
use App\Notifications\SendUserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailer;

class DossierComp extends Component
{
    use WithPagination;
    public $search = "";
    protected $paginationTheme = "bootstrap";
    //
    public $currentPage = PAGELIST;
    public $newDossier = [];
    public $editDossier = [];
    public $editOldValuesDossier = [];
    public $editHasChanged=false;
    public $importexport = "";
    public $ajoutButton=false;
    public $vNumDossier="";
    public $vModeTransport="";
    public $vRegimeDouanier="";
    public $vNbreTc20=0;
    public $vNbreTc40=0;
    public $vPoidsBrut=null;
    public $vNbreColis="";
    public $vMarchandise="";
    public $vCompagnie_id="";     
    public $vClient_id="";
    public $vlibClient="";
    public $vlibCompagnie="";       
    public $vConnaissement="";
    public $vDateOuverture=null;
    public $dossierTrouve=false;
    public $envoye =false;
    public $showButtonCreate=false;
    

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";
        $dossierQuery = Dossier::query();
        $compagnieQuery = Compagnie::query();
        $clientQuery = Client::query();

    
        if ($this->search != "") {
           $dossierQuery->where("numDossier","LIKE", $searchCriteria)
                ->Orwhere("connaissement", "LIKE", $searchCriteria)
                ->Orwhere("typeDossier", "LIKE", $searchCriteria)
                ->Orwhere("modeTransport", "LIKE", $searchCriteria)
                ->Orwhere("regimeDouanier", "LIKE", $searchCriteria)
                ->Orwhere("marchandise", "LIKE", $searchCriteria)
                ->Orwhere("libClient", "LIKE", $searchCriteria)
                ->Orwhere("dateOuverture", "LIKE", $searchCriteria)
                ->Orwhere("nbreColis", "LIKE", $searchCriteria);
                
        }

        $this->showAjoutButton();

        if($this->editDossier!=[]){
            $this->showUpDateButton();
        }
       
        if ($dossierQuery->count() > 0) {
            $this->dossierTrouve=true;
        } else {
            $this->dossierTrouve=false;
        }

        return view('livewire.dossiers.index', [
            "dossiers" => $dossierQuery->latest()->paginate(4),
            "compagnies" => $compagnieQuery->where("nomCompagnie","!=","")
                                           ->orderBy('nomCompagnie', 'asc')->get(),
            "clients" => $clientQuery->where("raisonSocial","!=","")
                                     ->orderBy('raisonSocial', 'asc')->get(),
        ])

            ->extends('layouts.master')
            ->section("contenu");
            
    }

    function showUpDateButton(){
        $this->editHasChanged=false;
        if($this->editDossier["numDossier"]!=$this->editOldValuesDossier["numDossier"] ||
        $this->editDossier["typeDossier"]!=$this->editOldValuesDossier["typeDossier"] ||
        $this->editDossier["modeTransport"]!=$this->editOldValuesDossier["modeTransport"] ||
        $this->editDossier["dateOuverture"]!=$this->editOldValuesDossier["dateOuverture"] ||
        $this->editDossier["regimeDouanier"]!=$this->editOldValuesDossier["regimeDouanier"] ||
        $this->editDossier["nbreTc20"]!=$this->editOldValuesDossier["nbreTc20"] ||
        $this->editDossier["nbreTc40"]!=$this->editOldValuesDossier["nbreTc40"] ||
        $this->editDossier["poidsBrut"]!=$this->editOldValuesDossier["poidsBrut"] ||
        $this->editDossier["nbreColis"]!=$this->editOldValuesDossier["nbreColis"] ||
        $this->vClient_id!=$this->editOldValuesDossier["client_id"] ||
        $this->editDossier["connaissement"]!=$this->editOldValuesDossier["connaissement"] ||
        $this->vCompagnie_id!=$this->editOldValuesDossier["compagnie_id"] ||
        $this->editDossier["marchandise"]!=$this->editOldValuesDossier["marchandise"]){
            $this->editHasChanged = true;
        }else
        {
            $this->editHasChanged = false;
        }
    }

    function showAjoutButton(){
        $this->ajoutButton=false;
        if($this->vNumDossier!="" &&
        $this->importexport!="" &&
        $this->vRegimeDouanier!="" &&
        $this->vDateOuverture!=null &&
        $this->vModeTransport!="" &&
        $this->vNbreTc20!="" &&
        $this->vNbreTc40!="" &&
        $this->vPoidsBrut!=null &&
        $this->vNbreColis!="" &&
        $this->vClient_id!="" &&
        $this->vConnaissement!="" &&
        $this->vCompagnie_id!="" &&
        $this->vMarchandise!=""
        ){
            $this->ajoutButton=true;
        }else{
            $this->ajoutButton=false;
        }
    }

    public function ajoutDossier()
    {
        
        $this->importexport = "";
        $this->vNumDossier="";
        $this->vModeTransport="";
        $this->vRegimeDouanier="";
        $this->vNbreTc20=0;
        $this->vNbreTc40=0;
        $this->vPoidsBrut=null;
        $this->vNbreColis="";
        $this->vMarchandise="";
        $this->vCompagnie_id="";
        $this->vClient_id="";
        $this->vConnaissement=""; 
        $this->vDateOuverture=now()->toDateString('Y-m-d');
        $this->showButtonCreate=true; 
    }

    public function showCreate(){
        $this->showButtonCreate=false;
    }
  
    public function goToEditDossier($id)
    {
        $this->editDossier = Dossier::find($id)->toArray();
        $this->editOldValuesDossier=$this->editDossier;
        $this->vCompagnie_id=$this->editDossier["compagnie_id"];
        $this->vClient_id=$this->editDossier["client_id"];
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToTableDossiers()
    {
        $this->currentPage = PAGELIST;
        $this->editDossier = [];
        $this->vlibClient="";
        $this->vlibCompagnie="";
        $this->vCompagnie_id="";     
        $this->vClient_id="";
    }

     public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                'editDossier.typeDossier' => 'required',
                'editDossier.modeTransport' => 'required',
                'editDossier.regimeDouanier' => 'required',
                'editDossier.nbreTc20' => 'required|integer',
                'editDossier.nbreTc40' => 'required|integer',
                'editDossier.poidsBrut' => 'required|integer',
                'editDossier.nbreColis' => 'required',
                'editDossier.marchandise' => 'required',
                'vCompagnie_id' => 'required',
                'vClient_id' => 'required',
                'editDossier.connaissement' => 'required',
                'editDossier.dateOuverture' => 'required'

            ];
        }

        return [
            'vNumDossier' => 'required|unique:dossiers,numDossier',
            'vModeTransport' => 'required',
            'vRegimeDouanier' => 'required',
            'vNbreTc20' => 'required|integer',
            'vNbreTc40' => 'required|integer',
            'vPoidsBrut' => 'required|integer',
            'vNbreColis' => 'required',
            'vMarchandise' => 'required',
            'vCompagnie_id' => 'required',
            'vClient_id' => 'required',
            'vConnaissement' => 'required',
            'vDateOuverture' => 'required'
        ];
    }

    public function addDossier()
    {
        // par défaut notre image est une placeholder
       $imagePath = "images/imageplaceholder.png";
        
        //Récupération du libellé client
       $client=Client::find($this->vClient_id);
       $this->vlibClient=$client->raisonSocial;
       
       //Récupération du libellé compagnie
       $compagnie=Compagnie::find($this->vCompagnie_id);
       $this->vlibCompagnie=$compagnie->nomCompagnie;
       
       
        //Vérification des règles de validation (rules)
        $validationAttributes = $this->validate();
        
        //insertion des données
        $validationAttributes["newDossier"]["user_id"] = auth()->user()->id;
        $validationAttributes["newDossier"]["typeDossier"] = $this->importexport;
        $validationAttributes["newDossier"]["statuCoter"] = 0;
        $validationAttributes["newDossier"]["statuValider"] = 0;
        $validationAttributes["newDossier"]["statuMisEnLivraison"] = 0;
        $validationAttributes["newDossier"]["statuBae"] = 0;
        $validationAttributes["newDossier"]["statuLivrer"] = 0;
        $validationAttributes["newDossier"]["numDossier"] =$this->vNumDossier;
        $validationAttributes["newDossier"]["modeTransport"] =$this->vModeTransport;
        $validationAttributes["newDossier"]["regimeDouanier"] =$this->vRegimeDouanier;
        $validationAttributes["newDossier"]["nbreTc20"] =$this->vNbreTc20;
        $validationAttributes["newDossier"]["nbreTc40"] =$this->vNbreTc40;
        $validationAttributes["newDossier"]["poidsBrut"] =$this->vPoidsBrut;  
        $validationAttributes["newDossier"]["nbreColis"] =$this->vNbreColis;  
        $validationAttributes["newDossier"]["marchandise"] =$this->vMarchandise;
        $validationAttributes["newDossier"]["compagnie_id"] =$this->vCompagnie_id;
        $validationAttributes["newDossier"]["client_id"] =$this->vClient_id;
        $validationAttributes["newDossier"]["connaissement"] =$this->vConnaissement; 
        $validationAttributes["newDossier"]["dateOuverture"] =$this->vDateOuverture;
        $validationAttributes["newDossier"]["libClient"] =$this->vlibClient;
        $validationAttributes["newDossier"]["nomCompagnie"] =$this->vlibCompagnie;
        $validationAttributes["newDossier"]["imageUrl"] =$imagePath;    
            
        //Création du dossier
        $dossier = Dossier::create($validationAttributes['newDossier']);

         //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showMessageCreate", ["message" => "Dossier créé avec succès !"]);

        //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$this->vClient_id)->first();

        //Initialisation du tableau après création
        $this->newDossier = [];
        $this->importexport = "";
        $this->vNumDossier="";
        $this->vModeTransport="";
        $this->vRegimeDouanier="";
        $this->vNbreTc20=0;
        $this->vNbreTc40=0;
        $this->vPoidsBrut="";
        $this->vNbreColis="";
        $this->vMarchandise="";
        $this->vCompagnie_id="";
        $this->vClient_id="";
        $this->vlibClient="";
        $this->vlibCompagnie="";
        $this->vConnaissement="";
        $this->vDateOuverture="";
        $this->showCreate();
       
       //Dispatch le mail
       if (isset($user->email)) {
        $user->notify(new OuvertureNotification($dossier));
       
       }

       

    }

    public function updateDossier()
    {
            //Récupération du libellé client
        $client=Client::find($this->vClient_id);
        $this->vlibClient=$client->raisonSocial;
        
        //Récupération du libellé compagnie
        $compagnie=Compagnie::find($this->vCompagnie_id);
        $this->vlibCompagnie=$compagnie->nomCompagnie;

        //Vérification des informations
        $validationAttributes = $this->validate();
        $validationAttributes["editDossier"]["libClient"] =$this->vlibClient;
        $validationAttributes["editDossier"]["nomCompagnie"] =$this->vlibCompagnie;
        $validationAttributes["editDossier"]["client_id"] =$this->vClient_id;
        $validationAttributes["editDossier"]["compagnie_id"] =$this->vCompagnie_id;

        Dossier::find($this->editDossier["id"])->update($validationAttributes['editDossier']);

        $this->goToTableDossiers();

        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Dossier mis à jour avec succès !"]);
        
    }

    public function confirmDelete(Dossier $dossier)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer le dossier n° ".$dossier->numDossier." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "dossier_id"=>$dossier->id
            ]
        ]]);
    }

    public function deleteDossier(Dossier $dossier){
        $dossier->delete();
        $this->dispatchBrowserEvent("showMessageDeleteDossier", ["message" => "Dossier supprimé avec succès !"]);
    }

     public function retour(){
    return redirect()->route(route:'home');
    }

     public function imprimeListe(){
        return response()->streamDownload(function () {
            
            $searchCriteria = "%" . $this->search . "%";
            $dossierQuery = Dossier::query();

        if ($this->search != "") {
            $dossierQuery->where("numDossier","LIKE", $searchCriteria)
                ->Orwhere("connaissement", "LIKE", $searchCriteria)
                ->Orwhere("typeDossier", "LIKE", $searchCriteria)
                ->Orwhere("modeTransport", "LIKE", $searchCriteria)
                ->Orwhere("regimeDouanier", "LIKE", $searchCriteria)
                ->Orwhere("client_id", "LIKE", $searchCriteria)
                ->Orwhere("marchandise", "LIKE", $searchCriteria)
                ->Orwhere("nbreColis", "LIKE", $searchCriteria);
        }
        
           //
            $data=[
            
            'date'=>date(format:'d/m/y'), //date du jour
            'dateHeureActu'=>Carbon::now(), //date et l'heure actuelles
            "dossiers" => $dossierQuery->orderBy('created_at','desc')->get()
            
        ];
           
            $pdf = App::make('dompdf.wrapper');
            //pour la numerotation des pages
            $pdf->getDomPDF()->set_option("enable_php", true);
            //
            $pdf->loadView('livewire.dossiers.iliste',$data)
            ->setPaper('A4','landscape')
            ->setOption(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true,'defaultFont'=>'courrier','dpi'=>'130'])
             ->setWarnings(false);
             echo $pdf->stream();
        },'listeDossier.pdf');

     }

     
}
