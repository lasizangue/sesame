@section("titre")
     Tableau de bord - Transit général rapide
@endsection
<form role="form">
     @csrf
<div wire:poll.7s>

<div class="row pl-4 pt-2 text-primary">
     <div class="mr-4"><h2>Dashboard</h2></div>
        <div>
           <div class="btn-group">
               <button type="button" class="btn btn-dark">Génération d'états</button>
               <button type="button" class="btn btn-dark dropdown-toggle dropdown-icon" data-toggle="dropdown">
               <span class="sr-only">Toggle Dropdown</span>
               </button>
               <div class="dropdown-menu" role="menu">
               <a class="dropdown-item btn btn-link" wire:click='goToDecMensuel()'>Déclarations mensuelles ou périodiques</a>
               <a class="dropdown-item btn btn-link" wire:click='goToNonValide()'>Dossiers non validés</a>
               <a class="dropdown-item btn btn-link" wire:click='goToDossierExport()'>Dossiers export</a>

               <div class="dropdown-divider"></div>

               <a class="dropdown-item btn btn-link" wire:click='goToClientCircuit()'>Etat par client par circuit</a>
               <a class="dropdown-item btn btn-link" wire:click='goToClientDateOuv()'>Etat par client par date ouverture</a>
               <a class="dropdown-item btn btn-link" wire:click='goToClientDateValid()'>Etat par client par date validation</a>
               <a class="dropdown-item btn btn-link" wire:click='goToClientTypeDos()'>Etat par client par type dossier</a>

               <div class="dropdown-divider"></div>
               <a class="dropdown-item btn btn-link" wire:click='listeConteneur()'>Nombre de TC par client par période</a>
          </div>
          
      </div>
    </div>
</div>
<div class="row pl-4 pt-2" >
      <div class="col-4">
           <div class="small-box bg-info">
               <div class="inner">
                    <h3>{{ $nbreExport }}</h3>
                    <p>Dossiers export non validés</p>
               </div>
               <div class="icon">
                    <i class="far fa-folder"></i>
               </div>
               <a wire:click="expnonvalid()" class="small-box-footer btn btn-link">Plus info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <div class="col-4">
           <div class="small-box bg-success">
               <div class="inner">
                    <h3>{{ $nbreImport }}</h3>
                    <p>Dossiers import non validés</p>
               </div>
               <div class="icon">
                    <i class="far fa-folder"></i>
               </div>
               <a wire:click="impnonvalid()" class="small-box-footer btn btn-link">Plus info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <div class="col-4">
           <div class="small-box bg-warning">
               <div class="inner">
                    <h3>{{ $nbreClients }}</h3>
                    <p>Nombre de clients</p>
               </div>
               <div class="icon">
                   <i class="fas fa-user"></i>
               </div>
               <a wire:click="listeClient()" class="small-box-footer btn btn-link">Plus info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div> 
</div>
<div class="row pl-4 pt-2">
     <div class="col-12">
          <div class="card">
          <div class="card-header bg-primary">
               <div class="row">
                    <div class="col-5">
                         <h4>Cheminement dossier</h4>
                    </div>
                    <div class="col-7">
                       
                         <div class="input-group-append">
                              <input type="search" wire:model.debounce="search"  class="form-control form-control-md mr-1" placeholder="Critères de recherche" style="border:solid 2px; border-color:red; font-style:italic;">
                              <button type="submit" class="btn btn-md btn-default">
                                   <i class="fa fa-search"></i>
                              </button>
                         </div>
                      
                    </div>
               </div>  
          </div>
          <div class="card-body table-responsive p-0 table-striped" style="height: 500px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:20%" >N°Dossier</th>
                    <th style="width:20%" >Client</th>
                    <th style="width:20%" >Connaissement</th>
                    <th style="width:20%" >Type</th>
                    <th style="width:20%" class="text-center">Position actuelle</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dossiers as $dossier)
                 
                    <tr>
                        <td>{{$dossier->numDossier}}</td>
                        <td>{{$dossier->libClient}}</td>
                        <td>{{$dossier->connaissement}}</td>
                        <td>{{$dossier->typeDossier}}</td>
                        <td class="text-center">

                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation=="" && $dossier->okrfcv=="" && $dossier->okfdi=="" && $dossier->dateValidation=="" && $dossier->dateMiseEnLivraison=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" &&  $dossier->dateNavire=="" && $dossier->datePassage=="" )

                            <div class="badge badge-pill bg-primary">Ouverture</div>
                            <a  class="btn btn-link" wire:click="goToOuverture({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif
                            
                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv=="" && $dossier->okfdi=="" && $dossier->dateValidation=="" && $dossier->dateMiseEnLivraison=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" &&  $dossier->dateNavire=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-info">Cotation</div>
                            <a  class="btn btn-link" wire:click="goToCotation({{$dossier->id}})" ><i class="fas fa-eye"></i></a>
                                
                            @endif 

                             @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && ($dossier->okrfcv!="" || $dossier->okfdi!="") && $dossier->dateValidation=="" && $dossier->dateMiseEnLivraison=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" &&  $dossier->dateNavire=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-warning">Documentation</div>
                            <a  class="btn btn-link" wire:click="goToDocumentation({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif 

                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" &&  $dossier->dateNavire=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-dark">Validation</div>
                            <a  class="btn btn-link" wire:click="goToValidation({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif 

                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison=="" &&  $dossier->dateNavire!="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-indigo">Prépa.mise en livraison</div>
                            <a  class="btn btn-link" wire:click="goToPrepaMiseLivraison({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif

                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison!="" &&  $dossier->dateNavire!="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-danger">Mise en livraison</div>
                            <a  class="btn btn-link" wire:click="goToMiseLivraison({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif
                            
                            @if (($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison!="" && $dossier->dateLivraison!="" && $dossier->dateNavire!="" && $dossier->dateArrivee==""  && $dossier->datePassage=="")||($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateArrivee!="" && $dossier->datePassage==""))

                            <div class="badge badge-pill bg-success">Livraison</div>
                            <a  class="btn btn-link" @if ($dossier->dateArrivee=="")
                                                            wire:click="goToLivraison({{$dossier->id}})"
                                                            @else
                                                                 wire:click="goToLivraisonA({{$dossier->id}})"
                                                       @endif ><i class="fas fa-eye"></i></a>
                                
                            @endif 

                            @if (($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison!="" && $dossier->dateLivraison!="" && $dossier->dateNavire!="" && $dossier->dateArrivee=="" && $dossier->datePassage!="")||($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison=="" && $dossier->dateNavire=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee!="" && $dossier->datePassage!=""))

                            <div class="badge badge-pill bg-orange">Passage</div>
                            <a  class="btn btn-link" wire:click="goToPassage({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif 

                        </td>
                    </tr>
                  
                @empty
                    
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-danger alert-dismissible">
                                    <h5><i class="icon fas fa-ban"></i> Information !</h5>
                                    Aucune donnée trouvée par rapport aux éléments de recherche entrés
                            </div>
                        </td>
                    </tr>
                @endforelse
             </tbody>
          </table>
        </div>
     </div>
     </div>
</div>
</div>
</form>


