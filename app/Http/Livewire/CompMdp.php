<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Detachement;
use App\Models\Service;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CompMdp extends Component
{
   public $currentPage = PAGELIST;
   public $editHasChanged=false;
   public $editUser=[];
   public $editOldValuesUser=[];
   public $vClient="";
   public $vDetachement="";
   public $vService="";
   public $vPassword="";
   public $vcPassword="";

    public function render()
    {
         if($this->editUser!=[]){
            $this->showUpDateButton();
         }
         return view('livewire.mdps.index')
            ->extends('layouts.master')
            ->section("contenu");
    }

    function showUpDateButton(){
        $this->editHasChanged=false;
        if($this->vPassword!="" && $this->vcPassword!="" && $this->vPassword==$this->vcPassword){
            $this->editHasChanged = true;
        }else
        {
            $this->editHasChanged = false;
        }
    }

    public function goToEditUser(User $user){
       $this->editUser = User::find($user->id)->toArray();
       //Libelle détachement
       $idDetachement=$this->editUser["detachement_id"];
       $detachement = Detachement::find($idDetachement);
       $this->vDetachement=$detachement->nomDetachement;
       //Libelle service
       $idService=$this->editUser["service_id"];
       $service = Service::find($idService);
       $this->vService=$service->nomService;
       //Libelle client
       $idClient=$this->editUser["client_id"];
       $client = Client::find($idClient);
       $this->vClient=$client->raisonSocial;
       //
       $this->editOldValuesUser=$this->editUser;
       $this->currentPage = PAGEEDITFORM;
    }

     public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.sexe' => 'required',
                'editUser.matricule' =>
                ['required', Rule::unique("users", "matricule")->ignore($this->editUser['id'])],
                'editUser.email' =>
                ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id'])],
                'vPassword' => 'required|min:8|max:15',
                'vDetachement' => 'required',
                'vService' => 'required',
                'vClient' => 'required'
            ];
        }

    }

    public function updateUser()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();
        //mise à jour password
        $validationAttributes["editUser"]["password"] = $this->vPassword;

        User::find($this->editUser["id"])->update($validationAttributes['editUser']);
        
        //Message de réussite
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Changement effectué avec succès !"]);

        $this->goToInfo();

    }

    public function goToInfo(){
        $this->currentPage = PAGELIST;
        $this->editUser=[];
    }

     public function retour(){

        return redirect()->route(route:'home');
    }
}
