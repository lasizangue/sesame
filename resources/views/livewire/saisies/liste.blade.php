<div class="row">
          
          <div class="col-4 mt-2">
                   <button type="button" class="btn btn-block btn-outline-info btn-sm" wire:click.prevent='ajoutCompagnie()'>Gestion des compagnies</button>
          </div>
         {{-- <div class="col-2 mt-2">
                   <a href="{{route('acconier.index')}}" type="button" class="btn btn-block btn-outline-info btn-sm">Gestion des acconiers</a>
                    
          </div>--}}
          
</div>

<div class="row">
    <div class="card mt-2" style="width:100%">
    <div class="card-header bg-dark">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="nav-icon fas fa-folder-plus fa-lg mr-1"></i>Liste des dossiers aériens</h3>
            <div class="card-tools d-flex align-items-center">
                
                <form role="form">
                    @csrf
                <div class="input-group input-group-md" style="width: 500px;">
                    <input type="text" name="table_search" wire:model.debounce="searche" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        
                            <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                            </button>
                       
                    </div>
                </div>
                 </form>
            </div>
        </div>
    <div class="card-body table-responsive p-0 table-striped table-hover" style="height: 300px;">
           <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:10%" >N°Dossier</th>
                    <th style="width:20%" >Numero de LTA</th>
                    <th style="width:20%" >Compagnie</th>
                    <th style="width:10%" >Vol</th>
                    <th style="width:20%" >Aéroport de chargement</th>
                    <th style="width:10%" >Date d'arrivée</th>
                    <th style="width:10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dossiers as $dossier)
                {{--@if ($dossier->modeTransport=="Aérien")--}}
                 @if ($dossier->dateValidation!="" && $dossier->modeTransport=="Aérien" )
                     <tr>
                    <td>{{$dossier->numDossier}}</td>
                    <td>{{$dossier->connaissement}}</td>
                    <td>{{$dossier->nomCompagnie}}</td>
                    <td>{{$dossier->vol}}</td>
                    <td>{{$dossier->aeroportDepart}}</td>
                   
                        <td class="text-center"> @if ($dossier->dateArrivee){{Carbon\Carbon::parse($dossier->dateArrivee)->format('d-m-Y') }}@endif</td>
                    
                
                    <td class="text-center">
                
                    <button  class="btn btn-link " wire:click='goToEditBordero({{$dossier->id}})' ><i class="far fa-edit"></i></button>
                    
                    @if ($dossier->connaissement!="" && $dossier->nomCompagnie!="" && $dossier->vol!="" && $dossier->aeroportDepart!="" && $dossier->dateArrivee!="")
                        <button  class="btn btn-link" wire:click='printOrdre({{$dossier->id}})' ><i class="fas fa-print"></i></button>
                    @endif
                    

                    </td>
                </tr>
                   
                        
                 @endif
                    
                {{--@endif--}}
                @empty

                <tr>
                        <td colspan="7">
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

        <div class="card-footer">
                
               
        </div>
</div>

          
</div>