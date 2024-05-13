<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceComp extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newService = [];
    public $editService = [];


    public function render()
    {

        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "services" => Service::where("nomService", "like", $searchCriteria)->latest()->paginate(4)
        ];

        return view('livewire.servics.index', $data)
            ->extends('layouts.master')
            ->section("contenu");
    }

    public function ajoutService()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditService($id)
    {
        $this->editService = Service::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToTableServices()
    {
        $this->currentPage = PAGELIST;
        $this->editService = [];
    }

    public function addService()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();

        //Ajouter un nouvel détachement
        Service::create($validationAttributes['newService']);

        //Initialisation du tableau après création
        $this->newService = [];

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Service créé avec succès !"]);
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editService.nomService' => 'required',
            ];
        }

        return [
            'newService.nomService' => 'required',
        ];
    }

    public function editService()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();

        Service::find($this->editService["id"])->update($validationAttributes['editService']);
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Service mis à jour avec succès !"]);
    }

     public function confirmDelete(Service $service)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer le service : ".$service->nomService." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "service_id"=>$service->id
            ]
        ]]);
    }

    public function deleteService(Service $service){
        $service->delete();
        $this->dispatchBrowserEvent("showMessageDeleteDetachement", ["message" => "Service supprimé avec succès !"]);
    }


}
