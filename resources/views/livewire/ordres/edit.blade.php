<div class="row p-4 pt-5">
    
        <div class=" mb-3 badge bg-indigo" style="width:100%">
                    <h2 ><i class="fab fa-first-order mr-4"></i>Aperçu de l'ordre de livraison</h2>
                    @if ($vTypeChargement!="Vrac" && $vTypeChargement!="" && ($countV!=null || $countQ!=null))
                    
                            <div > <a wire:click.prevent='imprimeOrdre()' class="btn btn-link text-warning" ><i class="fas      fa-print mr-1"></i>imprimer l'ordre</a></div>

                            <div wire:loading>
                                 Traitement du bordereau...
                            </div>
                        @else
                        
                            <span class="text-warning">Type de chargement non pris en compte (Vrac) ou <br/>conteneur(s) non enregistré(s) !!!</span>
                     @endif   
                    
        </div>
        
        <div class="card card-primary " style="width:100%">
            <div class="card-body">

                <form role= "form" method="POST">
                 @csrf
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label>N°Déclaration</label>
                        <input type="text" wire:model="editDossier.numDeclaration" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label>nTC20</label>
                        <input type="integer" wire:model="editDossier.nbreTc20" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label>nTC40</label>
                        <input type="integer" wire:model="editDossier.nbreTc40" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Circuit</label>
                        <input type="text" wire:model="editDossier.circuit" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control text-danger" disabled>
                    </div>
                </div>
                 <div class="col-4">
                    <div class="form-group">
                        <label>Client</label>
                        <input type="text" wire:model="libClient" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Compagnie</label>
                        <input type="text" wire:model="libCompagnie" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Connaissement</label>
                        <input type="text" wire:model="editDossier.connaissement" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Navire</label>
                        <input type="text" wire:model="editDossier.navire" class="form-control" disabled>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Date d'arrivée</label>
                        <input type="date" wire:model="editDossier.dateNavire" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Port de chargement</label>
                        <input type="text" wire:model="editDossier.port" class="form-control" disabled>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6" >
                    <div class="card">
                         
                        <div class="card-body table-responsive p-0 table-striped" style="height: 150px;">
                            <table class="table table-head-fixed text-nowrap table-sm">
                                 <thead class="thead">
                                    <tr>
                                        <th class="bg-dark">Liste des conteneurs 20'</th>   
                                    </tr>
                                 </thead>
                                 
                                     <tbody>
                                         @foreach ( $conteneurs as $conteneur)
                                            <tr>
                                                 @if ($conteneur->typeTc=="Tc 20'")
                                                    <td>{{$conteneur->numTc}}</td>
                                                        
                                                 @endif
                                                
                                            </tr>
                                        @endforeach
                                         
                                    </tbody>
                             </table> 
                       </div>
                   
                   <div class="card-footer-sm bg-secondary ">
                        <div class="ml-2">Nombre TC 20' = {{$countV}}</div>
                   </div>
                 </div>
                </div>
                <div class="col-6" >
                    <div class="card">
                         
                        <div class="card-body table-responsive p-0 table-striped" style="height: 150px;">
                            <table class="table table-head-fixed text-nowrap table-sm">
                                 <thead class="thead">
                                    <tr>
                                        <th class="bg-dark">Liste des conteneurs 40'</th>   
                                    </tr>
                                 </thead>
                                 
                                     <tbody>
                                         @foreach ( $conteneurs as $conteneur)
                                         
                                            <tr>
                                                 @if ($conteneur->typeTc=="Tc 40'")
                                                    <td>{{$conteneur->numTc}}  </td>
                                                       
                                                 @endif
                                                
                                            </tr>
                                        @endforeach
                                         
                                    </tbody>
                                    
                             </table>
                       </div>
                   
                    <div class="card-footer-sm bg-secondary ">
                        <div class="ml-2">Nombre TC 40' = {{$countQ}}</div>
                   </div>
                   </div>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-3">
                     <div class="form-group">
                        <label>Observation</label>
                        <textarea wire:model="editDossier.observLivraison" class="form-control" disabled></textarea>
                    </div>
                </div>
                <div class="col-3">
                        <div class="form-group">
                            <label>Lieu de livraison</label>
                            <textarea wire:model="editDossier.lieu" class="form-control" disabled></textarea>
                        </div>
                </div>
                <div class="col-3">
                        <div class="form-group">
                            <label>Livré sur</label>
                            <input type="text" wire:model="editDossier.modeLivraison" class="form-control" disabled>
                        </div>
                </div>
                <div class="col-3">
                        <div class="form-group">
                            <label>Date ordre livraison</label>
                            <input type="date" wire:model="editDossier.dateOrdreLivraison" class="form-control" disabled>
                        </div>
                </div>
            </div>
            </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button type="button" wire:click.prevent="goToFind()" class="btn btn-danger">Retour</button>
                    </div>
                </div>
            </form>
    </div>
</div>

