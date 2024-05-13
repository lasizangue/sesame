<?php

namespace App\Http\Livewire;

use App\Models\Compagnie;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class CompagnieComp extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newCompagnie = [];
    public $editCompagnie = [];

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "compagnies" => Compagnie::where("nomCompagnie", "like", $searchCriteria)->latest()->paginate(4)
        ];

        return view('livewire.compagnies.index',$data)
        ->extends('layouts.master')
        ->section("contenu");
    }

    public function ajoutCompagnie()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditCompagnie($id)
    {
        $this->editCompagnie = Compagnie::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }


    public function goToTableCompagnies()
    {
        $this->currentPage = PAGELIST;
        $this->editCompagnie = [];
    }

    public function addCompagnie()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();

        //Ajouter un nouvel détachement
        Compagnie::create($validationAttributes['newCompagnie']);

        //Initialisation du tableau après création
        $this->newCompagnie = [];

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Compagnie créé avec succès !"]);
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editCompagnie.nomCompagnie' => 'required',
            ];
        }

        return [
            'newCompagnie.nomCompagnie' => 'required',
        ];
    }

    public function editCompagnie()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();

        Compagnie::find($this->editCompagnie["id"])->update($validationAttributes['editCompagnie']);
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Compagnie mise à jour avec succès !"]);
    }

    public function confirmDelete(Compagnie $compagnie)
    {
        //Compagnie::destroy($id);
         $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer la compagnie : ".$compagnie->nomCompagnie." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "compagnie_id"=>$compagnie->id
            ]
        ]]);
    }

    public function deleteCompagnie(Compagnie $compagnie){
        $compagnie->delete();
        $this->dispatchBrowserEvent("showMessageDeleteCompagnie", ["message" => "Compagnie supprimé avec succès !"]);
    }

    public function retour(){
    return redirect()->route(route:'home');
    }
}
