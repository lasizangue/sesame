<?php

namespace App\Http\Livewire;

use App\Helpers\LogActivity;
use App\Imports\ClientsImport;
use App\Imports\CompagniesImport;
use App\Models\Client;
use App\Models\Compagnie;
use App\Models\LogActivitie;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CompMaintenance extends Component
{
    use WithFileUploads;

    public $vapro=true;
    public $vrecup=false;
    public $vcli=false;
    public $vlog=false;
    public $vcomp=false;
    public $file="";
    public $fileComp="";
    public $search="";

    public function render()
    {
        Carbon::setLocale("fr");
        $searchCriteria = "%" . $this->search . "%";

        $clients=Client::orderBy('created_at','desc')->get();
        $nbreElements=Client::all()->count();
        $compagnies=Compagnie::orderBy('created_at','desc')->get();
        $nbre=Compagnie::all()->count();

        //
       // $logs= LogActivity::logActivityLists();
        $logs = LogActivitie::query();
        

        if ($this->search != "") {
           
           $logs->where("id","LIKE", $searchCriteria)
                ->Orwhere("subject", "LIKE", $searchCriteria)
                ->Orwhere("url", "LIKE", $searchCriteria)
                ->Orwhere("method", "LIKE", $searchCriteria)
                ->Orwhere("ip", "LIKE", $searchCriteria)
                ->Orwhere("agent", "LIKE", $searchCriteria)
                ->Orwhere("user_id", "LIKE", $searchCriteria)
                ->Orwhere("created_at", "LIKE", $searchCriteria);
       
        }
       
        return  view('livewire.outils.index',[
            "clients" => $clients,
            "compagnies" => $compagnies,
            "nbreElements" => $nbreElements,
            "nbre" => $nbre,
            "logs" => $logs->latest()->get()
            
        ])
            ->extends('layouts.master')
            ->section("contenu");  
    }
  
    public function apropos(){
        $this->vapro=true;
        $this->vrecup=false;
        $this->vcli=false;
        $this->vcomp=false;
        $this->vlog=false;
    }

    public function misePlace(){
        $this->vrecup=true;
        $this->vapro=false;
        $this->vcli=false;
        $this->vcomp=false;
        $this->vlog=false;
    }

     public function logActivite(){
        $this->vlog=true;
        $this->vrecup=false;
        $this->vapro=false;
        $this->vcli=false;
        $this->vcomp=false;
    }

    public function pageClient(){
        $this->vcli=true;
        $this->vcomp=false;
        
    }

    public function pageCompagnie(){
        $this->vcli=false;
        $this->vcomp=true;
        
    }
   
     public function import(){
        $clients=Client::all();
        $clients->map->delete();
        
        $this->validate([
            'file'=>'required|mimes:xlsx, xls'
        ]);
        Excel::import(new ClientsImport, $this->file);

        session()->flash('message','Fichier importé avec succès !');
       
    }

    public function importComp(){
        $compagnies=Compagnie::all();
        $compagnies->map->delete();
        
        $this->validate([
            'fileComp'=>'required|mimes:xlsx, xls'
        ]);
        Excel::import(new CompagniesImport, $this->fileComp);

        session()->flash('message','Fichier importé avec succès !');
        
    }

    public function confirmDelete(LogActivitie $logactivitie)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer le log adresse ip : ".$logactivitie->ip." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "logactivitie_id"=>$logactivitie->id
            ]
        ]]);
    }

    public function deleteLog(LogActivitie $logactivitie){
        $logactivitie->delete();
        $this->dispatchBrowserEvent("showMessageDeleteDossier", ["message" => "Activité supprimée avec succès !"]);
    }


}
