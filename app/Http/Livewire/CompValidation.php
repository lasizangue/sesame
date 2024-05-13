<?php

namespace App\Http\Livewire;

use App\Jobs\SendDossierValideMailJob;
use App\Mail\DossierValideMail;
use App\Models\Client;
use App\Models\Dossier;
use App\Models\User;
use App\Notifications\ValidationNotification;
use Brick\Math\BigNumber;
use Carbon\Carbon;
use Faker\Core\Number as CoreNumber;
use illuminate\Support\Number;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use NumberFormatter;

class CompValidation extends Component
{
   use WithPagination;
   protected $paginationTheme = "bootstrap";
   public $currentPage = PAGELIST;
   public $editHasChanged=false;
   public $search="";
   public $find="";
   public $ajoutButton=false;
   public $editDossier = [];
   public $editOldValuesDossier=[];
   public $idDossier=0;
   public $champVide=true;
   public $dejaValide="";
   public $dossierTrouve=false;
   public $vClient="";
   public $idClient=0;
   public $HasChanged=false;
   public $dejaCote=false,$vMontanDeclaration=0,$vMontanDec=null,$vMontanFormat=null,$vMontanForma=null,$vDateValid=null,$vNumDossier="",$vTypeDossier="",$vClientVal="",$vNumDeclaration="",$vNumLiquidation="",$vCircuit="",$showButtonValid=false;
  
   
    public function render()
    {
        Carbon::setLocale("fr");

        if($this->vMontanDeclaration==null){
            $this->vMontanFormat=number_format(0, 0, ',', ' ');
        }else{
             $this->vMontanFormat=number_format($this->vMontanDeclaration, 0, ',', ' ');
        }

        if($this->vMontanDec==null){
            $this->vMontanForma=number_format(0, 0, ',', ' ');
        }else{
             $this->vMontanForma=number_format($this->vMontanDec, 0, ',', ' ');
        }
        //recherche
        $searchCriteria = "%" . $this->search . "%";
        $dossierQuery = Dossier::query()
        ->where("dateValidation", "<>","");

        if ($this->search != "") {
            
           $dossierQuery->where("numDossier","LIKE", $searchCriteria)
                ->Orwhere("typeDossier", "LIKE", $searchCriteria)
                ->Orwhere("numDeclaration", "LIKE", $searchCriteria)
                ->Orwhere("numLiquidation", "LIKE", $searchCriteria)
                ->Orwhere("dateValidation", "LIKE", $searchCriteria)
                ->Orwhere("circuit", "LIKE", $searchCriteria)
                ->Orwhere("client_id", "LIKE", $searchCriteria);
                 
                return view('livewire.valids.index',[
             "dossiers" => $dossierQuery->orderBy('dateValidation','desc')->get()
        ])
        ->extends('layouts.master')
        ->section("contenu");
        }

         if ($this->find != "") {
            $this->champVide=false;
            $dossier = Dossier::where("numDossier",$this->find)
            ->get();
            $dosier = Dossier::where("numDossier",$this->find)
            ->first();
           
        if ($dossier->count()> 0) {
           
            $this->dossierTrouve=true;
            $this->idDossier=$dosier->id;
            $this->idClient=$dosier->client_id;
            $this->vClientVal=$dosier->libClient;
            //recherche du libellé client
            $client=Client::find($this->idClient);
            $this->vClient=$client["raisonSocial"];
         
            //
            if($dosier->dateCotation!=""){
               $this->dejaCote=true;
            }else{
               $this->dejaCote=false;
            }
            //
            if($dosier->dateValidation!=""){
                $this->dejaValide=true;
            }else{
                $this->dejaValide=false; 
            } 

        }else{
             $this->dossierTrouve=false;
        } 

        }else{
            $this->champVide=true;
        }   

        if($this->editDossier!=[]){
            $this->showUpDateButtonValide();
            $this->showEditButton();
        }
    
        return view('livewire.valids.index',[
             "dossiers" => $dossierQuery->orderBy('dateValidation','desc')->get() 
        ])
        ->extends('layouts.master')
        ->section("contenu");
    }
                   

    function showUpDateButtonValide(){
        $this->editHasChanged=false;
        if($this->vNumDeclaration!="" &&
        $this->vNumLiquidation!="" &&
        $this->vDateValid!="" &&
        $this->vCircuit!=""
        ){
            $this->editHasChanged = true;
        }else
        {
            $this->editHasChanged = false;
        }
    }

    function showEditButton(){
        $this->HasChanged=false;
        if($this->editDossier["numDeclaration"]!=$this->editOldValuesDossier["numDeclaration"] ||
        $this->editDossier["numLiquidation"]!=$this->editOldValuesDossier["numLiquidation"] ||
        $this->editDossier["dateValidation"]!=$this->editOldValuesDossier["dateValidation"] ||
        $this->vMontanDeclaration!=$this->editOldValuesDossier["montanDeclaration"] ||
        $this->editDossier["circuit"]!=$this->editOldValuesDossier["circuit"] 
        ){
            $this->HasChanged = true;
        }else
        {
            $this->HasChanged = false;
        }
        
    }

    public function retour(){
    return redirect()->route(route:'home');
    }

    public function rechercheDossierAvalide()
    {
        if($this->champVide!=true){
            
            if($this->dossierTrouve==true){
                if($this->dejaCote==true){
                    if($this->dejaValide==false){
                    //recupération des infos
                    $this->editDossier = Dossier::find($this->idDossier)->toArray();
                    $this->editOldValuesDossier=$this->editDossier;
                    //
                    $this->vNumDossier=$this->editDossier["numDossier"];
                    $this->vTypeDossier=$this->editDossier["typeDossier"];
                    $this->vNumDeclaration=$this->editDossier["numDeclaration"];
                    $this->vNumLiquidation=$this->editDossier["numLiquidation"];
                    $this->vDateValid=$this->editDossier["dateValidation"];
                    $this->vCircuit=$this->editDossier["circuit"];
                    $this->vMontanDec=null;
                    $this->showButtonValid=true;
                    //$this->vDateValid=now()->toDateString('Y-m-d');
                }else{
                     $this->dispatchBrowserEvent("showSuccesValide", ["message" => "Ce dossier est déjà validé ! Merci."]);
                }
                }else{
                     $this->dispatchBrowserEvent("showNonCote", ["message" => "Ce dossier n'est pas coté ! Merci."]);
                }
                
            }else{
                $this->dispatchBrowserEvent("showSuccesAucun", ["message" => "Aucun enregistrement trouvé !   Merci."]);
            }

        }else{
            $this->dispatchBrowserEvent("showMessageVide", ["message" => "Impossible !   Merci."]);
        }
       
    }

    public function showButtonfalse(){
        $this->showButtonValid=false;
    }

     public function goToListe()
    {
        $this->currentPage = PAGELIST;
        $this->editDossier = [];
    }

    public function razChamp(){
        $this->find="";
    }

    public function rules()
    {
       if($this->currentPage==PAGEEDITFORM){
            return [
                        'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                        'editDossier.typeDossier' => 'required',
                        'vClient' => 'required',
                        'editDossier.numDeclaration' => 'required',
                        'editDossier.numLiquidation' => 'required',
                        'editDossier.dateValidation' => 'required',
                        'vMontanDeclaration' => 'required',
                        'editDossier.circuit' => 'required',
                    ];
    } 

            return [
                        'vNumDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                        'vTypeDossier' => 'required',
                        'vClientVal' => 'required',
                        'vNumDeclaration' => 'required',
                        'vNumLiquidation' => 'required',
                        'vDateValid' => 'required',
                        'vMontanDec' => 'nullable',
                        'vCircuit' => 'required',
                    ];
    
    }

     public function updateDossier()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();
        $validationAttributes["editDossier"]["montanDeclaration"] =$this->vMontanDeclaration;
            
        Dossier::find($this->editDossier["id"])->update($validationAttributes['editDossier']);

        //Récupération de la mise à jour
        $dossier = Dossier::find($this->editDossier["id"]);

         //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$this->editDossier["client_id"])->first();
        
        $this->goToListe();
        $this->razChamp();
    
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Mise à jour de la validation effectuée avec succès !"]);
    }

     public function majDossier()
    {
        $this->showButtonValid=false;
        //Vérification des informations
        $validationAttributes = $this->validate();
       
        $validationAttributes["editDossier"]["numDeclaration"] =$this->vNumDeclaration;
        $validationAttributes["editDossier"]["numLiquidation"] =$this->vNumLiquidation;
        $validationAttributes["editDossier"]["dateValidation"] =$this->vDateValid;
        $validationAttributes["editDossier"]["montanDeclaration"] =$this->vMontanDec;
        $validationAttributes["editDossier"]["circuit"] =$this->vCircuit;
       
        Dossier::find($this->editDossier["id"])->update($validationAttributes['editDossier']);

        //Récupération de la mise à jour
        $dossier = Dossier::find($this->editDossier["id"]);

         //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$this->editDossier["client_id"])->first();
        
        $this->goToListe();
        $this->razChamp();
        

        //Dispatch le mail
        if (isset($user->email) && $dossier->emailvalid==null) {
            $user->notify(new ValidationNotification($dossier));
            $dossier->emailvalid="oui";
            //Save
            $dossier->save();
        }

        
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Mise à jour de la validation effectuée avec succès !"]);

    }

    public function goToEditDossier(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->editOldValuesDossier=$this->editDossier;
        //Récupération du montant déclaration
        $this->vMontanDeclaration=$this->editDossier['montanDeclaration'];
        //recherche libellé client
        $this->idClient=$this->editDossier["client_id"];
        $client=Client::find($this->idClient);
        //
        if(isset($client->raisonSocial)){
            $this->vClient=$client->raisonSocial;
        }
        //
        $this->currentPage = PAGEEDITFORM;
    }

    public function imprimeListeValide(){
        return response()->streamDownload(function () {
            
            $searchCriteria = "%" . $this->search . "%";
            $dossierQuery = Dossier::query()
            ->where("dateValidation", "<>","");

        if ($this->search != "") {
            $dossierQuery->where("numDossier","LIKE", $searchCriteria)
                ->Orwhere("typeDossier", "LIKE", $searchCriteria)
                ->Orwhere("numDeclaration", "LIKE", $searchCriteria)
                ->Orwhere("numLiquidation", "LIKE", $searchCriteria)
                ->Orwhere("dateValidation", "LIKE", $searchCriteria)
                ->Orwhere("circuit", "LIKE", $searchCriteria)
                ->Orwhere("client_id", "LIKE", $searchCriteria);
        }
           //
            $data=[
            'date'=>date(format:'d/m/y'), //date du jour
            'dateHeureActu'=>Carbon::now(), //date et l'heure actuelles
            "dossiers" => $dossierQuery->orderBy('dateValidation','desc')->get()
        ];
           
            $pdf = App::make('dompdf.wrapper');
            //pour la numerotation des pages
            $pdf->getDomPDF()->set_option("enable_php", true);
            //affichage
            $pdf->loadView('livewire.valids.impliste',$data)
            ->setPaper('A4','landscape')
            ->setOption(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true,'defaultFont'=>'courrier','dpi'=>'130'])
             ->setWarnings(false);
             echo $pdf->stream();
        },'listeValide.pdf');

     }

}
