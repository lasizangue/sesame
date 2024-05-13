<?php

namespace App\Http\Livewire;

use App\Models\Acconier;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class CompAcconier extends Component
{
    use WithPagination;
    public $search = "";

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    public $newAcconier = [];
    public $editAcconier = [];

    public function render()
    {
        Carbon::setLocale("fr");
        
        $searchCriteria = "%" . $this->search . "%";
        $data = [
            "acconiers" => Acconier::where("nomAcconier", "like", $searchCriteria)->latest()->paginate(4)
            
        ];
        return view('livewire.acconiers.index',$data)
        ->extends('layouts.master')
        ->section("contenu");
    }

    public function retour(){
    
       return redirect()->route(route:'home');
    }

    public function addAcconier()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();

        //Ajouter un nouvel acconier
        Acconier::create($validationAttributes['newAcconier']);

        //Initialisation du tableau après création
        $this->newAcconier = [];

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Acconier créé avec succès !"]);
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editAcconier.nomAcconier' => 'required',
                'editAcconier.typeAcconier' => 'required',
            ];
        }

        return [
            'newAcconier.nomAcconier' => 'required',
            'newAcconier.typeAcconier' => 'required',
        ];
    }

    public function ajoutAcconier()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToTableAcconier()
    {
        $this->currentPage = PAGELIST;
        $this->editAcconier = [];
    }

    public function goToEditAcconier(Acconier $acconier)
    {
        $this->editAcconier = Acconier::find($acconier->id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function editAcconier()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();

        Acconier::find($this->editAcconier["id"])->update($validationAttributes['editAcconier']);
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Acconier mis à jour avec succès !"]);
    }

    public function confirmDelete(Acconier $acconier)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer l'acconier : ".$acconier->nomAcconier." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "acconier_id"=>$acconier->id
            ]
        ]]);
    }

    public function deleteAcconier(Acconier $acconier){
        $acconier->delete();
        $this->dispatchBrowserEvent("showMessageDeleteAcconier", ["message" => "Acconier supprimé avec succès !"]);
    }

}
