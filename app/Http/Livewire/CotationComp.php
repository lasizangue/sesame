<?php

namespace App\Http\Livewire;

use App\Jobs\SendCotationDossierMailJob;
use App\Mail\CotationDossierMail;
use App\Models\Dossier;
use App\Models\User;
use App\Notifications\CotationNotification;
use Carbon\Carbon;
use Error;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class CotationComp extends Component
{

    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGEEDITFORM;
    public $editDossier = [];
    public $dossierTrouve =false ;
    public $idDossier =0 ;
    public $vDateCotation=null;
    

    public function render()
    {

        Carbon::setLocale("fr");
        
        return view('livewire.cotations.index', [
            "dossiers" => Dossier::all(),
            "users" => User::where('service_id','1')
            ->orderBy('nom','asc')
            ->get()

        ])
            ->extends('layouts.master')
            ->section("contenu");
    }

    public function rechercheDossier()
    {
        
        if ($this->search != "") {

            $dossier = Dossier::where("numDossier",$this->search)->get();
            $dosier = Dossier::where("numDossier",$this->search)->first();

        if ($dossier->count()> 0) {
           
            $this->idDossier=$dosier->id;
            $this->dossierTrouve=true;
            $this->editDossier = Dossier::find($this->idDossier)->toArray();
            $this->vDateCotation=now()->toDateString('Y-m-d');
            
            //si dateCotation est nulle, vide le champ user
            if ($this->editDossier["dateCotation"] == null) {
                
                //$this->dispatchBrowserEvent("showSuccesMessCote", ["message" => "Ce dossier n'est pas encore coté."]);
            }else{
                 $this->dispatchBrowserEvent("showSuccesMessagePcot", ["message" => "Ce dossier est déjà coté ! Merci."]);
            }
            //Affiche les données et initialise la recherche

            $this->currentPage = PAGEEDITFORM;

            $this->search = "";
            
        } 
        else {
            $this->dossierTrouve=false;
            $this->dispatchBrowserEvent("showSuccesAucun", ["message" => "Aucun résultat trouvé !"]);
        }
             
        }
    }

    public function rules()

    {
        if ($this->currentPage == PAGEEDITFORM) {

            if ($this->editDossier != []) {
                
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
                    'editDossier.compagnie_id' => 'required',
                    'editDossier.client_id' => 'required',
                    'editDossier.connaissement' => 'required',
                    'editDossier.dateOuverture' => 'required',
                    'vDateCotation' => 'required',
                    'editDossier.agentCotation' => 'required',
                    'editDossier.typeChargement' => 'required',
                     
                ];
            }
        }
    }

    public function updateDossier()
    {
        
        if ($this->editDossier !=[] && $this->dossierTrouve==true ) {
            
                //Vérification des informations
            $validationAttributes = $this->validate();
            $validationAttributes["editDossier"]["statuCoter"] = 1;
            $validationAttributes["editDossier"]["dateCotation"] = $this->vDateCotation;
            
            Dossier::find($this->editDossier["id"])->update($validationAttributes['editDossier']);

            //Récupération de la mise à jour
            $dossier = Dossier::find($this->editDossier["id"]);
           
           $this->dossierTrouve=false;

           //recherche de l'email du user client
           $userQuery = User::query();
           
           $user=$userQuery->where("client_id",$this->editDossier["client_id"])->first();

            //Dispatch le mail
        if (isset($user->email) && $dossier->emailcota==null) {
            $user->notify(new CotationNotification($dossier));
            $dossier->emailcota="oui";
            //Save
            $dossier->save();
        }
        //
            $this->dispatchBrowserEvent("showSuccesMessageCot", ["message" => "Cotation validée avec succès !"]);
           
            
        } else{
             $this->dispatchBrowserEvent("showSuccesMessageRech", ["message" => "Veuillez-effectuer une recherche ! Merci."]);
        }
          
    }

    public function retour(){
    return redirect()->route(route:'home');
    }
}
