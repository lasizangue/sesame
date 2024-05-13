<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Compagnie;
use App\Models\Conteneur;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Dossier;
use App\Models\Fdi;
use App\Models\Rfcv;
use App\Models\Transporteur;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class VueGlobal extends Component
{
    public $search = "";
    public $searchenv = "";
    public $searchinv = "";
    public $searchcli = "";
    public $searchDossiersUser=null;
    public $vueaccueil=true;
    public $vueouv=false;
    public $vuecot=false;
    public $vuedoc=false;
    public $vuevalid=false;
    public $vuepassage=false;
    public $vuemiseliv=false;
    public $vuepmliv=false;
    public $vueliv=false,$vueliva=false;
    public $editDossier=[];
    public $vClient_id=null,$vCircuit="",$vDateOuv=null,$vDateValid=null,$vTypeDossier="";
    public $vNumDossier="",$docRfcvs="",$docFdis="",$vtitre="",$conteneurs="";
    public $vGene=false,$vDeclaMens=false,$vDosNv=false,$vDosExp=false,$vClienCirc=false,$vClienOuvertu=false,$vClienValid=false,$vClienType=false,$du=null,$au=null,$nbreExport=0,$nbreImport=0,$nbreClients=0;
    public $libTransporteur="";
    public $vexpnv=false,$vouve=false,$vcote=false,$vdoce=false,$vimpnv=false,$vouvi=false,$vcoti=false,$vdoci=false,$vliclien=false,$vueConteneur=false,$duC=null,$auC=null,$vClient_idC=null,$nbreTcVingt=0,$nbreTcQuara=0,$nbreTc=0;
    
    public function render()
    {
        Carbon::setLocale("fr");

         $this->conteneurs = Conteneur::where('dateValidation','<>',"")
        ->get();

        //Calcul du nombre de conteneurs
        $this->nbreTcVingt= Conteneur::where('dateValidation','<>',"")->where('typeTc',"Tc 20'")
        ->count();

        $this->nbreTcQuara= Conteneur::where('dateValidation','<>',"")->where('typeTc',"Tc 40'")
        ->count();

        $this->nbreTc= Conteneur::where('dateValidation','<>',"")
        ->count();
        

        if(isset(auth()->user()->client->id)){
             $this->searchDossiersUser=auth()->user()->client->id;
        }
        
        $searchCriteria ="%".$this->search."%";
        $searchCriteri =$this->searchenv;
        $searchCriter =$this->searchinv;
        $searchCrite ="%".$this->searchcli."%";
        $dossierQuery=Dossier::query();
        $clientQuery=Client::query();
        $clienQuery=Client::query();
        $compagnieQuery=Compagnie::query();

        //Nbre de dossiers export non validés
        $this->nbreExport=Dossier::where('typeDossier','Export')
        ->where('dateValidation',null) 
        ->count();

        //Nbre de dossiers import non validés
        $this->nbreImport=Dossier::where('typeDossier','Import')
        ->where('dateValidation',null) 
        ->count();
        
        //Nbre de clients
        $this->nbreClients=Client::all()
        ->count();
       
        
        if ($this->search != "") {
                $dossierQuery->where('numDossier',"LIKE",$searchCriteria)
                ->Orwhere('connaissement',"LIKE",$searchCriteria)
                ->Orwhere('typeDossier',"LIKE",$searchCriteria)
                ->Orwhere('typeChargement',"LIKE",$searchCriteria)
                ->Orwhere('modeTransport',"LIKE",$searchCriteria)
                ->Orwhere('regimeDouanier',"LIKE",$searchCriteria)
                ->Orwhere('marchandise',"LIKE",$searchCriteria)
                ->Orwhere('nbreColis',"LIKE",$searchCriteria)
                ->Orwhere('poidsBrut',"LIKE",$searchCriteria)
                ->Orwhere('numDeclaration',"LIKE",$searchCriteria)
                ->Orwhere('numLiquidation',"LIKE",$searchCriteria)
                ->Orwhere('circuit',"LIKE",$searchCriteria)
                ->Orwhere('dateCotation',"LIKE",$searchCriteria)
                ->Orwhere('datePassage', $searchCriteria)
                ->Orwhere('dateValidation',$searchCriteria)
                ->Orwhere('libClient',$searchCriteria)
                ->Orwhere('dateOuverture',"LIKE",$searchCriteria);
        }

        if ($this->searchenv != "") {
                $dossierQuery->where('numDossier',$searchCriteri)
                ->Orwhere('connaissement',$searchCriteri)
                ->Orwhere('typeDossier',$searchCriteri)
                ->Orwhere('typeChargement',$searchCriteri)
                ->Orwhere('modeTransport',$searchCriteri)
                ->Orwhere('regimeDouanier', $searchCriteri)
                ->Orwhere('marchandise',$searchCriteri)
                ->Orwhere('nbreColis',$searchCriteri)
                ->Orwhere('poidsBrut', $searchCriteri)
                ->Orwhere('numDeclaration',$searchCriteri)
                ->Orwhere('numLiquidation',$searchCriteri)
                ->Orwhere('circuit',$searchCriteri)
                ->Orwhere('dateCotation', $searchCriteri)
                ->Orwhere('datePassage', $searchCriteri)
                ->Orwhere('dateValidation',$searchCriteri)
                ->Orwhere('libClient',$searchCriteri)
                ->Orwhere('dateOuverture',$searchCriteri);
                
        }

        if ($this->searchinv != "") {
                $dossierQuery->where('numDossier',$searchCriter)
                ->Orwhere('connaissement',$searchCriter)
                ->Orwhere('typeDossier',$searchCriter)
                ->Orwhere('typeChargement',$searchCriter)
                ->Orwhere('modeTransport',$searchCriter)
                ->Orwhere('regimeDouanier', $searchCriter)
                ->Orwhere('marchandise',$searchCriter)
                ->Orwhere('nbreColis',$searchCriter)
                ->Orwhere('poidsBrut', $searchCriter)
                ->Orwhere('numDeclaration',$searchCriter)
                ->Orwhere('numLiquidation',$searchCriter)
                ->Orwhere('circuit',$searchCriter)
                ->Orwhere('dateCotation', $searchCriter)
                ->Orwhere('datePassage', $searchCriter)
                ->Orwhere('dateValidation',$searchCriter)
                ->Orwhere('libClient',$searchCriter)
                ->Orwhere('dateOuverture',$searchCriter);

        }

        if ($this->searchinv != "") {
                $dossierQuery->where('numDossier',$searchCriter)
                ->Orwhere('connaissement',$searchCriter)
                ->Orwhere('typeDossier',$searchCriter)
                ->Orwhere('typeChargement',$searchCriter)
                ->Orwhere('modeTransport',$searchCriter)
                ->Orwhere('regimeDouanier', $searchCriter)
                ->Orwhere('marchandise',$searchCriter)
                ->Orwhere('nbreColis',$searchCriter)
                ->Orwhere('poidsBrut', $searchCriter)
                ->Orwhere('numDeclaration',$searchCriter)
                ->Orwhere('numLiquidation',$searchCriter)
                ->Orwhere('circuit',$searchCriter)
                ->Orwhere('dateCotation', $searchCriter)
                ->Orwhere('datePassage', $searchCriter)
                ->Orwhere('dateValidation',$searchCriter)
                ->Orwhere('libClient',$searchCriter)
                ->Orwhere('dateOuverture',$searchCriter);

        }

        if ($this->searchcli != "") {
                $clientQuery->where('raisonSocial',"LIKE",$searchCrite)
                ->Orwhere('compteContrib',"LIKE",$searchCrite)
                ->Orwhere('adresse',"LIKE",$searchCrite)
                ->Orwhere('contact',"LIKE",$searchCrite);
               
        }
        
        
        if (auth()->user()->detachement->nomDetachement === "ESPACE CLIENTS"){
            
            $dossierQuery->where('client_id',$this->searchDossiersUser)->get();
          
        }

        
        if($this->duC!="" && $this->auC!="" ){
            
        $this->conteneurs = Conteneur::whereBetween('dateValidation', [$this->duC, $this->auC])
        ->get();

        //Calcul des conteneurs
        $this->nbreTcVingt= Conteneur::whereBetween('dateValidation', [$this->duC, $this->auC])->where('typeTc',"Tc 20'")
        ->count();

        $this->nbreTcQuara= Conteneur::whereBetween('dateValidation', [$this->duC, $this->auC])->where('typeTc',"Tc 40'")
        ->count();

        $this->nbreTc= Conteneur::whereBetween('dateValidation', [$this->duC, $this->auC])
        ->count();
        
        }

        if($this->vClient_idC!="" ){
            
          $this->conteneurs = Conteneur::where('client_id', $this->vClient_idC)
        ->get();

        //Calcul des conteneurs
        $this->nbreTcVingt= Conteneur::where('typeTc',"Tc 20'")
        ->where('client_id', $this->vClient_idC)
        ->count();

        $this->nbreTcQuara= Conteneur::where('typeTc',"Tc 40'")
        ->where('client_id', $this->vClient_idC)
        ->count();

        $this->nbreTc= Conteneur::where('client_id', $this->vClient_idC)
        ->count();
   
        }


        if($this->du!=null && $this->au!=null ){
            
          $dossierQuery->whereBetween('dateValidation', [$this->du, $this->au]);
        
        }

        if($this->vDosNv==true){
            
          $dossierQuery->where('dateValidation',null);
        
        }

        if($this->vDosExp==true){
            
          $dossierQuery->where('typeDossier','Export');
        
        }

        if($this->vClient_id!=null){
            
          $dossierQuery->where('client_id',$this->vClient_id);
        
        }

        if($this->vCircuit!=""){
            
          $dossierQuery->where('circuit',$this->vCircuit);
        
        }

        if($this->vDateOuv!=null){
            
          $dossierQuery->where('dateOuverture',$this->vDateOuv);
        
        }

        if($this->vDateValid!=null){
            
          $dossierQuery->where('dateValidation',$this->vDateValid);
        
        }

        if($this->vTypeDossier!=""){
            
          $dossierQuery->where('typeDossier',$this->vTypeDossier);
        
        }

        if($this->vexpnv==true){
            
          $dossierQuery->where('typeDossier','Export')
                       ->where('dateValidation',null);
        
        }

         if($this->vimpnv==true){
            
          $dossierQuery->where('typeDossier','Import')
                       ->where('dateValidation',null);
        
        }
            
        return view('livewire.vues.index',[
            "dossiers" =>$dossierQuery->orderBy('dateOuverture', 'desc')->get(),
            "clients" =>$clienQuery->where("raisonSocial","!=","")->orderBy('raisonSocial', 'asc')->get(),
            "transporteurs" =>Transporteur::all(),
            "cliens" =>$clientQuery->orderBy('created_at', 'desc')->get(),
            "compagnies" =>$compagnieQuery->get(),
        ])
            ->extends('layouts.master')
            ->section("contenu");
    }

    public function goToOuverture(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();

         //
        $this->libTransporteur="";
        $transporteur=Transporteur::find($this->editDossier["transporteur_id"]);
        $this->libTransporteur=$transporteur->nomTransporteur ?? '';
        

        $this->vueaccueil=false;
        $this->vueouv=true;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
        
    }

     public function goToOuvertureB(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouve=true;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
        
    }

    public function goToOuvertureI(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();

        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
         $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouve=false;
        $this->vouvi=true;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
   
    }

     public function goToCotation(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=true;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
         $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
       
    }
   

     public function goToCotationB(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();

        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vdoce=false;
        $this->vcote=true;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
        
    }

     public function goToCotationI(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();

        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vdoce=false;
        $this->vcote=false;
        $this->vouvi=false;
        $this->vcoti=true;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
        
    }

    public function goToDocumentation(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();
        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=true;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
       
    }

     public function goToDocumentationB(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();
        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=true;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
        
    }

     public function goToDocumentationI(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();
        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=true;
        $this->vliclien=false;
        $this->vueConteneur=false;
        
    }
   

    public function goToValidation(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();

        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=true;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

     public function goToPrepaMiseLivraison(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();
        //
        $this->libTransporteur="";
        $transporteur=Transporteur::find($this->editDossier["transporteur_id"]);
        $this->libTransporteur=$transporteur->nomTransporteur ?? '';
        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=true;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

    public function goToPassage(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
         $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();
        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=true;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

     public function goToMiseLivraison(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();
        //
        $this->libTransporteur="";
        $transporteur=Transporteur::find($this->editDossier["transporteur_id"]);
        $this->libTransporteur=$transporteur->nomTransporteur ?? '';
        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=true;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }


     public function goToLivraison(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();
        //
        $this->libTransporteur="";
        $transporteur=Transporteur::find($this->editDossier["transporteur_id"]);
        $this->libTransporteur=$transporteur->nomTransporteur ?? '';
        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=true;
        $this->vueliva=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

     public function goToLivraisonA(Dossier $dossier)
    {
        $this->editDossier = Dossier::find($dossier->id)->toArray();
        $this->docRfcvs=Rfcv::where('dossier_id',$dossier->id)->get();
        $this->docFdis=Fdi::where('dossier_id',$dossier->id)->get();
        
        //
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=true;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

    public function goToMenu()
    {
        $this->vueaccueil=true;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vueliva=false;
        $this->editDossier=[];
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

     public function goToDecMensuel()
    {
        $this->vueaccueil=false;
        $this->vGene=true;
        $this->vDeclaMens=true;
        $this->vDosNv=false;
        $this->vDosExp=false;
        $this->vClienCirc=false;
        $this->vClienOuvertu=false;
        $this->vClienValid=false;
        $this->vClienType=false;
        $this->du=null;
        $this->au=null;
        $this->vtitre="Déclarations mensuelles ou périodiques";
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
       

    }

     public function goToNonValide()
    {
        $this->vueaccueil=false;
        $this->vGene=true;
        $this->vDeclaMens=false;
        $this->vDosNv=true;
        $this->vDosExp=false;
        $this->vClienCirc=false;
        $this->vClienOuvertu=false;
        $this->vClienValid=false;
        $this->vClienType=false;
        $this->vtitre="Dossiers non validés";
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;


    }

     public function goToDossierExport()
    {
        $this->vueaccueil=false;
        $this->vGene=true;
        $this->vDeclaMens=false;
        $this->vDosNv=false;
        $this->vDosExp=true;
        $this->vClienCirc=false;
        $this->vClienOuvertu=false;
        $this->vClienValid=false;
        $this->vClienType=false;
        $this->vtitre="Dossiers exports";
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }
    
     public function goToClientCircuit()
    {
        $this->vueaccueil=false;
        $this->vGene=true;
        $this->vDeclaMens=false;
        $this->vDosNv=false;
        $this->vDosExp=false;
        $this->vClienCirc=true;
        $this->vClienOuvertu=false;
        $this->vClienValid=false;
        $this->vClienType=false;
        $this->vClient_id=null;
        $this->vCircuit="";
        $this->vtitre="Liste par client par circuit";
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

     public function goToClientDateOuv()
    {
        $this->vueaccueil=false;
        $this->vGene=true;
        $this->vDeclaMens=false;
        $this->vDosNv=false;
        $this->vDosExp=false;
        $this->vClienCirc=false;
        $this->vClienOuvertu=true;
        $this->vClienValid=false;
        $this->vClienType=false;
        $this->vClient_id=null;
        $this->vDateOuv=null;
        $this->vtitre="Liste par client par date ouverture";
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

    public function goToClientDateValid()
    {
        $this->vueaccueil=false;
        $this->vGene=true;
        $this->vDeclaMens=false;
        $this->vDosNv=false;
        $this->vDosExp=false;
        $this->vClienCirc=false;
        $this->vClienOuvertu=false;
        $this->vClienValid=true;
        $this->vClienType=false;
        $this->vClient_id=null;
        $this->vDateValid=null;
        $this->vtitre="Liste par client par date validation";
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }

     public function goToClientTypeDos()
    {
        $this->vueaccueil=false;
        $this->vGene=true;
        $this->vDeclaMens=false;
        $this->vDosNv=false;
        $this->vDosExp=false;
        $this->vClienCirc=false;
        $this->vClienOuvertu=false;
        $this->vClienValid=false;
        $this->vClienType=true;
        $this->vClient_id=null;
        $this->vTypeDossier="";
        $this->vtitre="Liste par client par type dossier";
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;

    }


     public function goToMenuBord()
    {
        $this->vueaccueil=true;
        $this->vGene=false;
        $this->vDeclaMens=false;
        $this->vDosNv=false;
        $this->vDosExp=false;
        $this->vClienCirc=false;
        $this->vClienOuvertu=false;
        $this->vClienValid=false;
        $this->vClienType=false;
        $this->vtitre="";
        $this->du="";
        $this->au="";
        $this->vCircuit="";
        $this->vClient_id=null;
        $this->vDateValid=null;
        $this->vDateOuv=null;
        $this->vTypeDossier="";
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
    }

        public function download(Dossier $dossier)
    {
        return response()->download($dossier->imageUrl);
    }

         public function expnonvalid()
    {
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vexpnv=true;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
    }

         public function listeConteneur()
    {
       
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vexpnv=false;
        $this->vimpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=true;
    }


        public function impnonvalid()
    {
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vexpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vimpnv=true;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=false;
        $this->vueConteneur=false;
    }

        public function listeClient()
    {
        $this->vueaccueil=false;
        $this->vueouv=false;
        $this->vuecot=false;
        $this->vuedoc=false;
        $this->vuevalid=false;
        $this->vuepassage=false;
        $this->vuemiseliv=false;
        $this->vuepmliv=false;
        $this->vueliv=false;
        $this->vexpnv=false;
        $this->vouve=false;
        $this->vcote=false;
        $this->vdoce=false;
        $this->vimpnv=false;
        $this->vouvi=false;
        $this->vcoti=false;
        $this->vdoci=false;
        $this->vliclien=true;
        $this->vueConteneur=false;
    }
}
