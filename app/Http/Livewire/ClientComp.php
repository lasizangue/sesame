<?php

namespace App\Http\Livewire;

use App\Models\Client;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ClientComp extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    public $newClient = [];
    public $editClient = [];
    public $dateHeureActu;
    public $vAdresse="";
    public $vContact="";


    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";
        $clientQuery = Client::query();

        if ($this->search != "") {
            $clientQuery->where("raisonSocial", "LIKE", $searchCriteria)
                ->Orwhere("compteContrib", "LIKE", $searchCriteria);
        }
        return view('livewire.cliens.index', [
            "clients" => $clientQuery->latest()->paginate(4)
        ])
            ->extends('layouts.master')
            ->section("contenu");
    }

    public function ajoutClient()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditClient($id)
    {
        $this->editClient = Client::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToTableClients()
    {
        $this->currentPage = PAGELIST;
        $this->editClient = [];
    }

    public function addClient()
    {

        //Vérification des informations
        $validationAttributes = $this->validate();
        $validationAttributes["newClient"]["adresse"] =$this->vAdresse;
        $validationAttributes["newClient"]["contact"] =$this->vContact;

        //Ajouter un nouvel détachement
        Client::create($validationAttributes['newClient']);

        //Initialisation du tableau après création
        $this->newClient = [];
        $this->vAdresse="";
        $this->vContact="";

        //Affichage de l'évènement pour dire au client que la création est effectuée avec succès
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Client créé avec succès !"]);
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editClient.raisonSocial' => 'required',
                'editClient.compteContrib' => ['required', Rule::unique("clients", "compteContrib")->ignore($this->editClient['id'])],
                'editClient.adresse'=>'nullable',
                'editClient.contact'=>'nullable',
            ];
        }

        return [
            'newClient.raisonSocial' => 'required',
            'newClient.compteContrib' => 'required|unique:clients,compteContrib',
            'vAdresse'=>'nullable',
            'vContact'=>'nullable',
        ];
    }

    public function updateClient()
    {
        //Vérification des informations
        $validationAttributes = $this->validate();

        Client::find($this->editClient["id"])->update($validationAttributes['editClient']);
        $this->dispatchBrowserEvent("showSuccesMessageEdit", ["message" => "Client mis à jour avec succès !"]);
    }

     public function confirmDelete(Client $client)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text"=>"Vous êtes sur le point de supprimer le client ".$client->raisonSocial." de la liste. Voulez-vous continuer ?",
            "titre"=>"Etes-vous sûr de continuer ?",
            "type"=>"warning",
            "data"=>[
                "client_id"=>$client->id
            ]
        ]]);
    }

    public function deleteClient(Client $client){
        $client->delete();
        $this->dispatchBrowserEvent("showMessageDeleteClient", ["message" => "Client supprimé avec succès !"]);
    }

    public function retour(){
    return redirect()->route(route:'home');
    }

    public function imprimeListeClient(){
        return response()->streamDownload(function () {
            
             $this->dateHeureActu = Carbon::now(); //date et l'heure actuelles

             $searchCriteria = "%" . $this->search . "%";
             $clientQuery = Client::query();

        if ($this->search != "") {
            $clientQuery->where("raisonSocial", "LIKE", $searchCriteria)
                ->Orwhere("compteContrib", "LIKE", $searchCriteria);
        }
        
           //
            $data=[
            //'title'=>'welcome to coding',
            'date'=>date(format:'d/m/y'), //date du jour
            'dateHeureActu'=> $this->dateHeureActu, //date et l'heure actuelles
            'clients'=>$clientQuery->orderBy('raisonSocial','asc')->get()
                                    
        ];
            
            $pdf = App::make('dompdf.wrapper');
            //numerotation de page
            $pdf->getDomPDF()->set_option("enable_php", true);
            //
            $pdf->loadView('livewire.cliens.iliste',$data)
            ->setPaper('A4','portrait')
            ->setOption(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true,'defaultFont'=>'courrier','dpi'=>'130'])
             ->setWarnings(false);
             echo $pdf->stream();
        },'listeClient.pdf');
    }
}
 