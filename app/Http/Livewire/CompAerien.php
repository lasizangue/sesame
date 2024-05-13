<?php

namespace App\Http\Livewire;

use App\Jobs\SendLivraisonAerienMailJob;
use App\Mail\LivraisonAerienMail;
use App\Models\Client;
use App\Models\Compagnie;
use App\Models\Dossier;
use App\Models\User;
use App\Notifications\LivraisonServiceAerienNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CompAerien extends Component
{
    public $currentPage = PAGELIST;
    public $searche="";
    public $search = "";
    public $editDossier = [];
    public $newCompagnie=[];
    public $editCompagnie=[];
    public $editHasChangedCompa=false;
    public $editBordero="";
    public $vCompagnie_id=0,$vClient_id=0;
    public $vCreate=false,$vEdit=false;
    public $editOldValuesDossier = [];
    public $editOldValuesCompagnie = [];
    public $editHasChanged=false;
    //
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    //
    public function render()
    {
        $searchCriteria = "%".$this->searche."%";
        $searchCriteri = "%".$this->search."%";
        $dossierQuery = Dossier::query();
        $compagnieQuery = Compagnie::query();
        $compagniQuery = Compagnie::query();

        if($this->searche!=""){
            $dossierQuery->where("numDossier","LIKE", $searchCriteria)

                ->Orwhere("lta", "LIKE", $searchCriteria)
                ->Orwhere("nomCompagnie", "LIKE", $searchCriteria)
                ->Orwhere("vol", "LIKE", $searchCriteria)
                ->Orwhere("aeroportDepart", "LIKE", $searchCriteria)
                ->Orwhere("dateArrivee", "LIKE", $searchCriteria);
    
        }

        if($this->search!=""){
            $compagniQuery->where("nomCompagnie","LIKE", $searchCriteri);
                
        }

        if($this->editDossier!=[]){
            $this->showUpDateButton();
        }

        if($this->editCompagnie!=[]){
            $this->showUpDateButtonCompany();
        }

        return view('livewire.saisies.index',[
            "dossiers" => $dossierQuery->where("modeTransport","Aérien")
            ->where("dateValidation","!=","")
            ->get(),
            "compagnies" => $compagnieQuery->where("nomCompagnie","!=","")->orderBy('nomCompagnie','asc')->get(),
            "compagnis" => $compagniQuery->latest()->get(),
            "clients" =>Client::all()
        
        ])
        ->extends('layouts.master')
        ->section("contenu");
    }

    public function goToEditBordero(Dossier $dossier){
        $this->editDossier=Dossier::find($dossier->id)->toArray();
        $this->vCompagnie_id=$this->editDossier["compagnie_id"];
        $this->editOldValuesDossier=$this->editDossier;
        $this->currentPage = PAGEEDITFORM;
        
    }

    function showUpDateButton(){
        $this->editHasChanged=false;
        if($this->editDossier["connaissement"]!=$this->editOldValuesDossier["connaissement"] ||
        $this->vCompagnie_id!=$this->editOldValuesDossier["compagnie_id"] ||
        $this->editDossier["vol"]!=$this->editOldValuesDossier["vol"] ||
        $this->editDossier["aeroportDepart"]!=$this->editOldValuesDossier["aeroportDepart"] ||
        $this->editDossier["dateArrivee"]!=$this->editOldValuesDossier["dateArrivee"] 
        ){
            $this->editHasChanged = true;
        }else
        {
            $this->editHasChanged = false;
        }
    }

    function showUpDateButtonCompany(){
        $this->editHasChangedCompa=false;
        if($this->editCompagnie["nomCompagnie"]!=$this->editOldValuesCompagnie["nomCompagnie"] 
         
        ){
            $this->editHasChangedCompa = true;
        }else
        {
            $this->editHasChangedCompa = false;
        }
    }

    public function goToListe(){
        $this->currentPage = PAGELIST;
        $this->editDossier = [];
        $this->vCreate=false;
        $this->vEdit=false;
        
    }

     public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                'editDossier.typeDossier' => 'required',
                'editDossier.regimeDouanier' => 'required',
                'editDossier.numDeclaration' => 'required',
                'editDossier.circuit' => 'required',
                'editDossier.client_id' => 'required',
                'editDossier.poidsBrut' => 'required|integer',
                'editDossier.connaissement' => 'required',
                'vCompagnie_id' => 'required',
                'editDossier.vol' => 'required',
                'editDossier.aeroportDepart' => 'required',
                'editDossier.dateArrivee' => 'required',
                'editDossier.marchandise' => 'required'
                
            ];
        }

        if ($this->currentPage == PAGECREATEFORM) {

            if($this->vCreate==true){
                 return [
                    'newCompagnie.nomCompagnie' => 'required',
                ];
            }

            if($this->vEdit==true){
                 return [
                    'editCompagnie.nomCompagnie' => 'required',
                ];
            }

       }
    }

    public function majDossier() {
    
        $compagnie=Compagnie::find($this->vCompagnie_id);
        //Vérification des informations
        $validationAttributes = $this->validate();
        $validationAttributes["editDossier"]["nomCompagnie"] =$compagnie->nomCompagnie;
        
        $this->vClient_id=$validationAttributes["editDossier"]["client_id"];

        Dossier::find($this->editDossier["id"])->update($validationAttributes['editDossier']);

        $dossier =Dossier::find($this->editDossier["id"]);
        
        $this->goToListe();

        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Bordereau mis à jour avec succès !"]);

        //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$this->vClient_id)->first();

        if (isset($user->email) && $dossier->emailaerien==null) {
             $user->notify(new LivraisonServiceAerienNotification($dossier));
             $dossier->emailaerien="oui";
             //Save
             $dossier->save();
            
       }

        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Bordereau mis à jour avec succès !"]);
    }

    public function printOrdre(Dossier $dossier){
        $this->editBordero=Dossier::find($dossier->id);

        return response()->streamDownload(function () {
            Carbon::setLocale("fr");
            //
            $data=[
            'dateEnChaine'=>now()->toDateString('d-m-Y'),
            'dateHeureActu'=>Carbon::now()->isoFormat('LLLL'), //date en lettres(un L enlevé efface le jour, un autre efface l'heure)
            'dateHeureA'=>Carbon::now()->isoFormat('LL'),
            "dossier" =>$this->editBordero
            
            ];
           
            $pdf = App::make('dompdf.wrapper');
            //pour la numerotation des pages
            $pdf->getDomPDF()->set_option("enable_php", true);
            //
            $pdf->loadView('livewire.saisies.iliste',$data)
            ->setPaper('A4','portrait')
            ->setOption(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true,'defaultFont'=>'courrier','dpi'=>'130'])
             ->setWarnings(false);
             echo $pdf->stream();
        },'ordreLivAe.pdf');
        
     }

     public function ajoutCompagnie()
    {
        $this->vCreate=true;
        $this->vEdit=false;
        $this->search="";
        $this->currentPage = PAGECREATEFORM;
    }

     public function goToEditCompagnie(Compagnie $compagnie)
    {
        $this->editCompagnie = Compagnie::find($compagnie->id)->toArray();
        $this->editOldValuesCompagnie=$this->editCompagnie;
        $this->vCreate=false;
        $this->vEdit=true;
       $this->currentPage = PAGECREATEFORM;
    }

     public function addCompagnie()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();
       
        //Ajouter un nouvel détachement
        Compagnie::create($validationAttributes['newCompagnie']);

        //Initialisation du tableau après création
        $this->newCompagnie = [];

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Compagnie créé avec succès !"]);
    }

     public function editCompagnie()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();

        Compagnie::find($this->editCompagnie["id"])->update($validationAttributes['editCompagnie']);
        //
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Compagnie mise à jour avec succès !"]);
    }

   public function confirmDelete(Compagnie $compagnie)
    {
        //Compagnie::destroy($id);
         $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer la compagnie : ".$compagnie->nomCompagnie." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "compagnie_id"=>$compagnie->id
            ]
        ]]);
    }

    public function deleteCompagnie(Compagnie $compagnie){
        $compagnie->delete();
        $this->dispatchBrowserEvent("showMessageDeleteCompagnie", ["message" => "Compagnie supprimé avec succès !"]);
    }


    

}
