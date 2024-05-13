<?php

namespace App\Http\Livewire;

use App\Jobs\SendWelcomeUserJob;
use App\Mail\WelcomeUserMail;
use App\Models\Client;
use App\Models\Detachement;
use App\Models\Service;
use App\Models\User;
use App\Notifications\UserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\Mail;
use PDF;
use PhpParser\Node\Stmt\ElseIf_;

class Utilisateur extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newUser = [];
    public $editUser = [];
    public $dateHeureActu;
    public $vClient_id=null,$vClient_idEdit=null;
    public $vType="",$vTypeEdit="";
   
   
    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";
        $userQuery = User::query();
        $detachementQuery = Detachement::query();
        $serviceQuery = Service::query();
        $clientQuery = Client::query();
        
      if ($this->vClient_idEdit==1) {
        $this->vTypeEdit="Interne";
      }

      if ($this->vClient_idEdit==null) {
        $this->vTypeEdit="";
      }
      
      if($this->vClient_idEdit!=null && $this->vClient_idEdit!=1 ){
        $this->vTypeEdit="Externe";
    }
      
      if ($this->vClient_id==1) {
        $this->vType="Interne";
      }

      if ($this->vClient_id==null) {
        $this->vType="";
      }
      
      if($this->vClient_id!=null && $this->vClient_id!=1 ){
        $this->vType="Externe";
    }

        if ($this->search != "") {
           $userQuery->where("nom", "LIKE", $searchCriteria)
                ->Orwhere("prenom", "LIKE", $searchCriteria);
        }
         

        return view('livewire.utilisateurs.index', [
            "users" => $userQuery->latest()->paginate(4),
            "detachements" => $detachementQuery->where("nomDetachement","!=","")
                                               ->orderBy('nomDetachement', 'asc')->get(),
            "services" => $serviceQuery->where("nomService","!=","")
                                       ->orderBy('nomService', 'asc')->get(),
            "clients" => $clientQuery->where("raisonSocial","!=","")
                                     ->orderBy('raisonSocial', 'asc')->get(),
        ])
            ->extends('layouts.master')
            ->section("contenu");
    }

    public function goToListe(){

        $this->currentPage = PAGELIST;

    }

    public function ajoutUser()
    {
        $this->vClient_id =null;
        $this->vType ="";
    
        $this->currentPage = PAGECREATEFORM;
        $this->newUser["password"]="password";
    }

    public function goToEditUser($id)
    {
        $this->editUser = User::find($id)->toArray();
        $this->vTypeEdit=$this->editUser["type"];
        $this->vClient_idEdit=$this->editUser["client_id"];
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToTableUsers()
    {
        $this->currentPage = PAGELIST;
        $this->editUser = [];
        $this->vClient_idEdit=null;
        $this->vTypeEdit="";
    }

    public function addUser()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();
        $validationAttributes["newUser"]["type"] = $this->vType;
        $validationAttributes["newUser"]["client_id"] = $this->vClient_id;
        
        //Ajouter un nouvel détachement
        $user = User::create($validationAttributes['newUser']);

        //Initialisation du tableau après création
        $this->newUser = [];
        $this->vClient_id =null;
        $this->vType ="";
        $this->newUser["password"]="password";

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        session()->flash('message', 'Utilisateur créé avec succès !');

        //Dispatch le mail
       if (isset($user->email)) {
        $user->notify(new UserNotification($user));
        
       }
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.sexe' => 'required',
                'vTypeEdit' => 'required',
                'editUser.matricule' =>
                ['required', Rule::unique("users", "matricule")->ignore($this->editUser['id'])],
                'editUser.email' =>
                ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id'])],
                'editUser.detachement_id' => 'required',
                'editUser.service_id' => 'required',
                'vClient_idEdit' => 'required'
            ];
        }

        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.sexe' => 'required',
            'vType' => 'required',
            'newUser.matricule' => 'required|unique:users,matricule',
            'newUser.email' =>  'required|email|unique:users,email',
            'newUser.password' => 'required|min:8|max:15',
            'newUser.detachement_id' => 'required',
            'newUser.service_id' => 'required',
            'vClient_id' => 'required'

        ];
    }

    public function updateUser()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();
        $validationAttributes["editUser"]["type"] = $this->vTypeEdit;
        $validationAttributes["editUser"]["client_id"] = $this->vClient_idEdit;
        
        User::find($this->editUser["id"])->update($validationAttributes['editUser']);
        session()->flash('message', 'Mise à jour effectuée avec succès !');
    }

     public function confirmDelete(User $user)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer l'utilisateur : ".$user->nom."  ".$user->prenom. " de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "user_id"=>$user->id
            ]
        ]]);
    }

    public function deleteUser(User $user){
        $user->delete();
        session()->flash('message', 'Suppression effectuée avec succès !');
    }

     /*public function retour(){
    return redirect()->route(route:'home');
    }*/
  
    public function imprimeListe(){
       //Télécharge directement le pdf
       
        return response()->streamDownload(function () {
            
            $this->dateHeureActu = Carbon::now(); //date et l'heure actuelles
            //Trier selon le plus récent
             $searchCriteria = "%" . $this->search . "%";
             $userQuery = User::query();
        
        if ($this->search != "") {
           $userQuery->where("nom", "LIKE", $searchCriteria)
                ->Orwhere("prenom", "LIKE", $searchCriteria);
            
        }
        
           //
            $data=[
            //'title'=>'welcome to coding',
            'date'=>date(format:'d/m/y'), //date du jour
            'dateHeureActu'=>$this->dateHeureActu, //date et l'heure actuelles
            "users" => $userQuery->orderBy('created_at','desc')->get()
            
        ];
           
            $pdf = App::make('dompdf.wrapper');
            //pour la numerotation des pages
            $pdf->getDomPDF()->set_option("enable_php", true);
            //
            $pdf->loadView('livewire.utilisateurs.iliste',$data)
            ->setPaper('A4','landscape')
            ->setOption(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true,'defaultFont'=>'courrier','dpi'=>'130'])
             ->setWarnings(false);
             echo $pdf->stream();
        },'listeUtilisateur.pdf');

    }

    public function confirmReset(User $user)
    {
        $this->dispatchBrowserEvent("showConfirmReset", ["message" =>[
            "text"=>"Vous êtes sur le point de reinitialiser le mot de passe de Mr(Mme) ".$user->prenom." ".$user->nom."  Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "user_id"=>$user->id
            ]
        ]]);
    }

    public function resetPassword($id){
        
        //Mise à jour des valeurs
        $user = User::find($id);
        //lecture des infos
        $user->fill($this->editUser);
        $user->password="password";
        $user->save();
        //retour à la table
        $this->goToTableUsers();

         $this->dispatchBrowserEvent("showMessageReset", ["message" => "Mot de passe réinitialisé avec succès !"]);

    }
    
}


    