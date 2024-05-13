<div class="row px-4  mb-3 mt-3">
    <div class="col-4">
        <button type="button" wire:click.prevent='gestBureaeu()' class="btn btn-block btn-outline-primary">Gestion des bureaux de douane</button>
    </div>
    
</div>
<div class="row px-4  mb-0">
    
    <div class="col-12">
        <div class="card">
            <form role="form">
                @csrf
            <div class="card-header bg-primary">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="fa fa-user-graduate fa-lg mr-2"></i>Passage en douane - liste des dossiers</h3>
                 
            <div class="card-tools d-flex align-items-center">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce="search" class="form-control float-right" placeholder="Rechercher un dossier">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <div class="card-body table-responsive p-0 table-striped" style="height: 500px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:5%" >N°Dossier</th>
                    <th style="width:5%" >Date passage</th>
                    <th style="width:10%" >Circuit</th>
                    <th style="width:10%" >TC 20'</th>
                    <th style="width:10%" >TC 40'</th>
                    <th style="width:10%" >Date BAE</th>
                    <th style="width:10%" >N°BAE</th>
                    <th style="width:10%" >Bureau</th>
                    <th style="width:10%" >Phyto</th>
                    <th style="width:10%" >Type chargement</th>
                    <th style="width:10%" class="text-center">Action</th>
                   
                </tr>
            </thead>
            <tbody>
                @forelse($dossiers as $dossier)
                 @if ($dossier->dateValidation!="")
                <tr>
                    <td>{{$dossier->numDossier}}</td>
                    <td>
                        @if ($dossier->datePassage!="")
                            {{Carbon\Carbon::parse($dossier->datePassage)->format('d-m-Y')}}
                        @else
                            {{null}}
                        @endif
                    </td>
                    <td >{{$dossier->circuit}}</td>
                    <td >{{$dossier->nbreTc20}}</td>
                    <td >{{$dossier->nbreTc40}}</td>
                    <td >
                        @if ($dossier->dateBae!="")
                            {{Carbon\Carbon::parse($dossier->dateBae)->format('d-m-Y')}}
                        @else
                            {{null}}
                        @endif
                        
                    </td>
                    <td >{{$dossier->nBae}}</td>
                    <td >{{$dossier->bureauDouane}}</td>
                    <td >{{$dossier->phyto}}</td>
                    <td >{{$dossier->typeChargement}}</td>
                    <td >
                    
                    <a wire:click.prevent='passage({{$dossier->id}})' class="btn btn-link"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endif
                 @if ($dossier->dateValidation==null)
                    <tr>
                        <td colspan="11">
                            <div class="alert alert-success alert-dismissible">
                                    <h5><i class="icon fas fa-ban"></i> Information !</h5>
                                    Aucune donnée trouvée par rapport aux éléments de recherche entrés
                            </div>
                        </td>
                    </tr>
                  @endif
                @empty
                 <tr>
                        <td colspan="11">
                            <div class="alert alert-success alert-dismissible">
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
    </div>

  
    
   

 

    

    

   