<?php

namespace App\Http\Livewire;

use App\Jobs\SendOperationnelMailJob;
use App\Mail\OperationnelMail;
use App\Models\Buro;
use App\Models\User;
use App\Models\Dossier;
use App\Notifications\OperationnelNotification;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class CompOperationnel extends Component
{
    use WithPagination , WithFileUploads;

    public $search ="";
    protected $paginationTheme = "bootstrap";
    public $editDossier = [];
    public $newBuro=[],$editBuro=[];
    public $currentPage = PAGELIST;
    public $inputEditFileIterator=0,$editPhoto=null;
    public $vCreate=false;
    public $vEdit=false;
    public $editOldValuesBuro = [];
    public $editHasChanged=false;
    public $searchb="";
    public $vBuro_id=0;

    public function render()
    {
        Carbon::setLocale("fr");
        $searchCriteria = $this->search;
        $searchCriteri = "%" . $this->searchb . "%";
        $dossierQuery = Dossier::query();
        $buroQuery = Buro::query();

        if ($this->search != "") {
             $dossierQuery->where("numDossier","LIKE",$searchCriteria)
             ->Orwhere("datePassage","LIKE",$searchCriteria)
             ->Orwhere("circuit","LIKE",$searchCriteria)
             ->Orwhere("nbreTc20","LIKE",$searchCriteria)
             ->Orwhere("nbreTc40","LIKE",$searchCriteria)
             ->Orwhere("dateBae","LIKE",$searchCriteria)
             ->Orwhere("nBae","LIKE",$searchCriteria)
             ->Orwhere("bureauDouane","LIKE",$searchCriteria)
             ->Orwhere("phyto","LIKE",$searchCriteria)
             ->Orwhere("typeChargement","LIKE",$searchCriteria);
        }

        if ($this->searchb != "") {
             $buroQuery->where("code","LIKE",$searchCriteri)
             ->Orwhere("libelle", "LIKE", $searchCriteri);
        }

        $dossierQuery->where("dateValidation","!=",null);

        if($this->editBuro!=[]){
            $this->showEditButton();
        }

        return view('livewire.operationnels.index',[
            "dossiers" => $dossierQuery->orderBy('datePassage','desc')->get(),
            "buros" =>$buroQuery->orderBy('created_at','desc')->get(),
        ])
        ->extends('layouts.master')
        ->section("contenu");
        
    }

    public function passage($id){
       $this->editDossier = Dossier::find($id)->toArray();
       $this->vBuro_id=$this->editDossier["buro_id"];
       
       $this->currentPage = PAGEEDITFORM;
       
    }

    public function gestBureaeu(){
      
       $this->vCreate=true;
       $this->vEdit=false;
       $this->newBuro=[];
       $this->currentPage = PAGECREATEFORM;
       
    }

     public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editDossier.numDossier' => ['required', Rule::unique("dossiers", "numDossier")->ignore($this->editDossier['id'])],
                'editDossier.datePassage' => 'required',
                'editDossier.circuit' => 'required',
                'editDossier.dateBae' => 'nullable',
                'editDossier.nBae' => 'nullable',
                'vBuro_id' => 'required',
                'editDossier.phyto' => 'required',
                'editDossier.typeChargement' => 'required',
                'editDossier.dateVisite' => 'nullable',
                'editDossier.verificateur' => 'nullable',
                'editDossier.verifObserv' => 'nullable',
                'editPhoto'=>'file|mimes:png,jpg,pdf|max:102400|nullable'
            ];
        }

        if ($this->currentPage == PAGECREATEFORM) {

            if($this->vCreate==true){
                return [
                'newBuro.code' =>'required|unique:buros,code',
                'newBuro.libelle' => 'required',
                
            ];
            }

            if($this->vEdit==true){
                return [
                'editBuro.code' =>['required', Rule::unique("buros", "code")->ignore($this->editBuro['id'])],
                'editBuro.libelle' => 'required',
                
            ];
            }
        }

    }

    public function updateDossier()
    {
        $buro=Buro::find($this->vBuro_id);
        $this->validate();
        //$this->editDossier["buro_id"]=$this->vBuro_id;
        
        //Mise à jour des valeurs
        $dossier = Dossier::find($this->editDossier["id"]);

        $dossier->fill($this->editDossier);


        if ($this->editPhoto != null) {
            $path= $this->editPhoto->store('upload', 'public');
            
           //Pour l'enregistrement du fichier pdf
            $imagePath = "storage/".$path;

            Storage::disk("local")->delete(str_replace("storage/", "public/", $dossier->imageUrl));

            $dossier->imageUrl = $imagePath;
        }

        $dossier->statuBae = 1;
        $dossier->bureauDouane = $buro->libelle;
        $dossier->buro_id = $this->vBuro_id;

        $dossier->save();

        $this->inputEditFileIterator++;
        
         //recherche de l'email du user client
        $userQuery = User::query();
        $user=$userQuery->where("client_id",$dossier->client_id)->first();

        //Dispatching mail
        if (isset($user->email) && $dossier->emailpass==null) {
            $user->notify(new OperationnelNotification($dossier));
            $dossier->emailpass="oui";
            //Save
            $dossier->save();
        }
        
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Passage effectué avec succès !"]);
        $this->retour();
    }

     public function retour()
    {
        $this->vCreate=false;
        $this->vEdit=false;
        $this->editHasChanged=false;
        $this->searchb="";
        $this->currentPage = PAGELIST;
    }

    //Efface tous les fichiers temporaires
     protected function cleanupOldUploads(){

        $storage = Storage::disk("local");

        foreach($storage->allFiles("livewire-tmp") as $pathFileName){
            //si ce fichier n'existe plus continue
            if(! $storage->exists($pathFileName)) continue;
            //après 5s supp
            $fiveSecondsDelete = now()->subSeconds(5)->timestamp;

            if($fiveSecondsDelete > $storage->lastModified($pathFileName)){
                $storage->delete($pathFileName);
            }
        }
    }

    public function retourAccueil(){
        return redirect()->route(route:'home');

    }

    public function addBuro()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();

        //Ajouter un nouvel détachement
        Buro::create($validationAttributes['newBuro']);

        //Initialisation du tableau après création
        $this->newBuro = [];

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Bureau créé avec succès !"]);
    }

     public function deleteBuro(Buro $buro){
        $buro->delete();
        $this->dispatchBrowserEvent("showMessageDeleteBureau", ["message" => "Bureau supprimé avec succès !"]);
    }

    public function goToEditBuro($id)
    {
        $this->editBuro = Buro::find($id)->toArray();
        $this->editOldValuesBuro=$this->editBuro;
        $this->vCreate=false;
        $this->vEdit=true;
        $this->currentPage = PAGECREATEFORM;
    }

     function showEditButton(){
        $this->editHasChanged=false;
        if($this->editBuro["code"]!=$this->editOldValuesBuro["code"] ||
        $this->editBuro["libelle"]!=$this->editOldValuesBuro["libelle"]

        ){
            $this->editHasChanged=true;
        }else{
            $this->editHasChanged=false;
        }

    }

     public function editBuro()
    {
       
        //Vérification des informations
        $validationAttributes = $this->validate();
       
        Buro::find($this->editBuro["id"])->update($validationAttributes['editBuro']);

        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Bureau mis à jour avec succès !"]);
        
    }


}
