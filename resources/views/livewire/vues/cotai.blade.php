
     <div class="row p-4 pt-5">
            <div class="card card-success" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-folder-plus fa-lg mr-2"></i>Fiche de cotation</h3>
                </div>
                <div class="card-body">
                    
                    <form role= "form">
                 @csrf
                    <div class="row">
                                <div class="col-6">
                                        <div class="form-group">
                                        <label>N°Dossier:</label>
                                        <input type="text" wire:model="editDossier.numDossier" class="form-control" disabled >
                                        </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Date cotation:</label>
                                    <input type="date" wire:model="editDossier.dateCotation" class="form-control" disabled>
                                    </div>
                                </div>
                    </div>

                    <div class="row">
                    
                                <div class="col-8">
                                        <div class="form-group">
                                        <label>Nom de l'agent</label>
                                        <input type="text" wire:model="editDossier.agentCotation" class="form-control" disabled>
                                        </div>
                                </div>

                                <div class="col-4">
                                <div class="form-group">
                                   <label>Conteneurisation</label>
                                   <input type="text" wire:model="editDossier.typeChargement" class="form-control" disabled>
                                </div>
                        </div>
                    </div>
                    </div>
                       
                    <div class="card-footer ">
                            <div class="float-right">
                                <button wire:click.prevent="impnonvalid()" type="button" class="btn btn-danger">Retour</button>          
                            </div>
                    </div>
                 </form>
            </div>
            </div>
           
      
              
