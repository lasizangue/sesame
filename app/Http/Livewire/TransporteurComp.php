<?php

namespace App\Http\Livewire;

use App\Models\Transporteur;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TransporteurComp extends Component
{
    use WithPagination;

    public $search = "";
    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    public $editTransporteur = [];
    public $newTransporteur = [];

    public function render()
    {
        Carbon::setLocale("fr");
        
        $searchCriteria = "%" . $this->search . "%";
        $transporteurQuery = Transporteur::query();

        if ($this->search != "") {
           $transporteurQuery->where("nomTransporteur", "LIKE", $searchCriteria)
                             ->Orwhere("contacTransp", "LIKE", $searchCriteria);
        }
        
        return view('livewire.transporteurs.index',[
            "transporteurs" => $transporteurQuery->latest()->paginate(4),

        ])
        ->extends('layouts.master')
        ->section("contenu");
    }

     public function goToEditTransporteur(Transporteur $transporteur)
    {
        $id=$transporteur->id;
        $this->editTransporteur = Transporteur::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToList()
    {
        $this->currentPage = PAGELIST;
        $this->editTransporteur = [];
    }

     public function confirmDelete(Transporteur $transporteur)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer le transporteur : ".$transporteur->nomTransporteur." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "transporteur_id"=>$transporteur->id
            ]
        ]]);
    }

     public function deleteTransporteur(Transporteur $transporteur){
        $transporteur->delete();
        $this->dispatchBrowserEvent("showMessageDeleteTransporteur", ["message" => "Transporteur supprimé avec succès !"]);
    }

    public function ajoutTransporteur()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function editTransporteur()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();

        Transporteur::find($this->editTransporteur["id"])->update($validationAttributes['editTransporteur']);
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Transporteur mis à jour avec succès !"]);
    }

     public function addTransporteur()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();

        //Ajouter un nouvel détachement
        Transporteur::create($validationAttributes['newTransporteur']);

        //Initialisation du tableau après création
        $this->newTransporteur = [];

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Transporteur créé avec succès !"]);
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editTransporteur.nomTransporteur' => 'required',
                'editTransporteur.contacTransp' => 'required',
            ];
        }

        return [
            'newTransporteur.nomTransporteur' => 'required',
            'newTransporteur.contacTransp' => 'required',
        ];
    }

}
