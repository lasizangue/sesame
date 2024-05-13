<?php

namespace App\Http\Livewire;

use App\Models\Detachement;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;


class DetachementComp extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    

    public $newDetachement = [];
    public $editDetachement = [];


    public function render()
    {
        Carbon::setLocale("fr");
        
        $searchCriteria = "%" . $this->search . "%";
        
        $data = [
            "detachements" => Detachement::where("nomDetachement", "like", $searchCriteria)->latest()->paginate(4)
            
        ];

        return view('livewire.detachements.index', $data)
            ->extends('layouts.master')
            ->section("contenu");
    }

    public function ajoutDetachement()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditDetachement($id)
    {
        $this->editDetachement = Detachement::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }


    public function goToTableDetachements()
    {
        $this->currentPage = PAGELIST;
        $this->editDetachement = [];
    }

    public function addDetachement()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();

        //Ajouter un nouvel détachement
        Detachement::create($validationAttributes['newDetachement']);

        //Initialisation du tableau après création
        $this->newDetachement = [];

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Détachement créé avec succès !"]);
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editDetachement.nomDetachement' => 'required',
            ];
        }

        return [
            'newDetachement.nomDetachement' => 'required',
        ];
    }

    public function editDetachement()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();

        Detachement::find($this->editDetachement["id"])->update($validationAttributes['editDetachement']);
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Détachement mis à jour avec succès !"]);
    }

    public function confirmDelete(Detachement $detachement)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer le détachement : ".$detachement->nomDetachement." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "detachement_id"=>$detachement->id
            ]
        ]]);
    }

    public function deleteDetachement(Detachement $detachement){
        $detachement->delete();
        $this->dispatchBrowserEvent("showMessageDeleteDetachement", ["message" => "Détchement supprimé avec succès !"]);
    }

   /* public function confirmDelete($id)
    {
        Detachement::destroy($id);
    }*/

   /* public function retour(){
    return redirect()->route(route:'home');
    }*/
}
