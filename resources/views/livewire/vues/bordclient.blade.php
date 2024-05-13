@section("titre")
     Tableau de bord clients - Transit général rapide
@endsection
<div class="row p-4 pt-5" wire:poll.7s>
    <h1 class="bg-success" style="width:100%;">&nbsp; Customer dashboard</h1>
    <form role="form" class="input-group input-group-lg mb-2">
        @csrf
    <div class="input-group input-group-lg mb-2">
        <input type="search" wire:model.debounce="search"  class="form-control form-control-lg" placeholder="Veuillez saisir vos critères de recherche" style="border:solid 2px; border-color:red; font-style:italic;">
        <div class="input-group-append">
              <button type="submit" class="btn btn-lg btn-default">
                   <i class="fa fa-search"></i>
              </button>
        </div>
     </div>
     </form>

     <div class="card" style="width:100%;">
          <div class="card-header bg-primary">
                  <h5>Cheminement des dossiers</h5>
          </div>
          <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
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
                 @if ($dossier->client_id==$searchDossiersUser)
                    <tr>
                        <td>{{$dossier->numDossier}}</td>
                        <td>{{$dossier->libClient}}</td>
                        <td>{{$dossier->connaissement}}</td>
                        <td>{{$dossier->typeDossier}}</td>
                        <td class="text-center">
                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation=="" && $dossier->okrfcv=="" && $dossier->okfdi=="" && $dossier->dateValidation=="" && $dossier->dateMiseEnLivraison=="" &&  $dossier->dateNavire=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-primary">Ouverture</div>
                            <a  class="btn btn-link" wire:click.prevent="goToOuverture({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif
                            
                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv=="" && $dossier->okfdi=="" && $dossier->dateValidation=="" && $dossier->dateMiseEnLivraison=="" &&  $dossier->dateNavire=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-info">Cotation</div>
                            <a  class="btn btn-link" wire:click.prevent="goToCotation({{$dossier->id}})" ><i class="fas fa-eye"></i></a>
                                
                            @endif 

                             @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && ($dossier->okrfcv!="" || $dossier->okfdi!="") && $dossier->dateValidation=="" && $dossier->dateMiseEnLivraison=="" &&  $dossier->dateNavire=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-warning">Documentation</div>
                            <a  class="btn btn-link" wire:click.prevent="goToDocumentation({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif 

                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" &&  $dossier->dateMiseEnLivraison==""  &&  $dossier->dateNavire=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-dark">Validation</div>
                            <a  class="btn btn-link" wire:click.prevent="goToValidation({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif
                            
                             @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison=="" &&  $dossier->dateNavire!="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-indigo">Prépa.mise en livraison</div>
                            <a  class="btn btn-link" wire:click="goToPrepaMiseLivraison({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif

                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison!=""  &&  $dossier->dateNavire!="" && $dossier->dateLivraison=="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")

                            <div class="badge badge-pill bg-danger">Mise en livraison</div>
                            <a  class="btn btn-link" wire:click.prevent="goToMiseLivraison({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif
                            
                            @if (($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison!=""  &&  $dossier->dateNavire!="" && $dossier->dateLivraison!="" && $dossier->dateArrivee=="" && $dossier->datePassage=="")|| ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison==""  &&  $dossier->dateNavire=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee!="" && $dossier->datePassage==""))

                            <div class="badge badge-pill bg-success">Livraison</div>
                            <a  class="btn btn-link"  @if ($dossier->dateArrivee=="")
                                                            wire:click="goToLivraison({{$dossier->id}})"
                                                            @else
                                                                 wire:click="goToLivraisonA({{$dossier->id}})"
                                                       @endif ><i class="fas fa-eye"></i></a>
                                
                            @endif 

                            @if (($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison!=""  &&  $dossier->dateNavire!="" && $dossier->dateLivraison!="" && $dossier->datePassage!="" && $dossier->dateArrivee=="")||($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv!="" && $dossier->okfdi!="" && $dossier->dateValidation!="" && $dossier->dateMiseEnLivraison=="" &&  $dossier->dateNavire=="" && $dossier->dateLivraison=="" && $dossier->dateArrivee!="" && $dossier->datePassage!=""))

                            <div class="badge badge-pill bg-orange">Passage</div>
                            <a  class="btn btn-link" wire:click="goToPassage({{$dossier->id}})"><i class="fas fa-eye"></i></a><a  class="btn btn-link" wire:click.prevent="download({{$dossier->id}})">
                                @if ($dossier->dateBae!=null)
                                    <i class="fas fa-download"></i> Bae</a>
                                @endif
                                
                            @endif 
                        </td>
                    </tr>
                 
                  @endif
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

