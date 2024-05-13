
<form role="form">
               @csrf
<div class="row pl-4 pt-2 text-info">
     <div class="mr-4"><h2>Dashboard - Liste des dossiers export non validés</h2></div>
     <div><button type="button" class="btn btn-block btn-outline-dark btn-lg ml-5" wire:click.prevent='goToMenu()'>Retour</button></div> 
</div>

<div class="row pl-4 pt-2">
     <div class="col-12">
          <div class="card">

          
          <div class="card-header bg-info">
               <div class="row">
                    <div class="col-5">
                         <h4></h4>
                    </div>
                    <div class="col-7">
                         
                         <div class="input-group-append">
                              <input type="search" wire:model.debounce="searchenv"  class="form-control form-control-md mr-1" placeholder="Critères de recherche" style="border:solid 2px; border-color:red; font-style:italic;">
                              <button type="submit" class="btn btn-md btn-default">
                                   <i class="fa fa-search"></i>
                              </button>
                         </div>
                    </div>
               </div>  
          </div>
          </form>

          <div class="card-body table-responsive p-0 table-striped">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:12%" >N°Dossier</th>
                    <th style="width:20%" >Client</th>
                    <th style="width:16%" >Connaissement</th>
                    <th style="width:16%" >Rég.douan.</th>
                    <th style="width:16%" >Mode transp.</th>
                    <th style="width:20%" class="text-center">Position actuelle</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dossiers as $dossier)
                  @if ($dossier->typeDossier=="Export" && $dossier->dateValidation==null)
                      <tr>
                        <td>{{$dossier->numDossier}}</td>
                        <td>{{$dossier->libClient}}</td>
                        <td>{{$dossier->connaissement}}</td>
                        <td>{{$dossier->regimeDouanier}}</td>
                        <td>{{$dossier->modeTransport}}</td>
                        <td class="text-center">
                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation=="" && $dossier->okrfcv=="" && $dossier->okfdi=="" && $dossier->dateValidation=="" && $dossier->datePassage=="" && $dossier->dateMiseEnLivraison=="" && $dossier->dateLivraison=="")

                            <div class="badge badge-pill bg-primary">Ouverture</div>
                            <a  class="btn btn-link" wire:click=" goToOuvertureB({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif
                            
                            @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && $dossier->okrfcv=="" && $dossier->okfdi=="" && $dossier->dateValidation=="" && $dossier->datePassage=="" && $dossier->dateMiseEnLivraison=="" && $dossier->dateLivraison=="")

                            <div class="badge badge-pill bg-info">Cotation</div>
                            <a  class="btn btn-link" wire:click="goToCotationB({{$dossier->id}})" ><i class="fas fa-eye"></i></a>
                                
                            @endif 

                             @if ($dossier->dateOuverture!="" && $dossier->dateCotation!="" && ($dossier->okrfcv!="" || $dossier->okfdi!="") && $dossier->dateValidation=="" && $dossier->datePassage=="" && $dossier->dateMiseEnLivraison=="" && $dossier->dateLivraison=="")

                            <div class="badge badge-pill bg-warning">Documentation</div>
                            <a  class="btn btn-link" wire:click="goToDocumentationB({{$dossier->id}})"><i class="fas fa-eye"></i></a>
                                
                            @endif 

                        </td>
                    </tr>
                    
                  @endif
                    
                @empty
                    
                    <tr>
                        <td colspan="6">
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
