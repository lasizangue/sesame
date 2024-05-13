<div class="row p-4 pt-5">
        <div class="card card-info" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-folder-plus fa-lg mr-1"></i>Informations ouverture dossier</h3>
                </div>
             
        <form role= "form">
            @csrf
            
        <div class="card-body" >
            <div class="row">
                <div class="col-4">
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" >
                        <label>Type dossier</label>
                        <input type="text" wire:model="editDossier.typeDossier" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group">
                    <label>Mode transport</label>
                    <input type="text" wire:model="editDossier.modeTransport" class="form-control" disabled>   
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-3">
                        <div class="form-group">
                        <label>Date ouvert.</label>
                        <input type="date" wire:model="editDossier.dateOuverture" class="form-control" disabled>
                        </div>
                    </div>
                <div class="col-3">
                <div class="form-group">
                    <label>Régime douanier</label>
                     <input type="text" wire:model="editDossier.regimeDouanier" class="form-control" disabled>
                        
                    </div>
                </div>
                <div class="col-3">
                        <div class="form-group">
                            <label>Nombre TC 20':</label>
                            <input type="number" wire:model="editDossier.nbreTc20" class="form-control" disabled>
                         </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                         <label>Nombre TC 40':</label>
                        <input type="number" wire:model="editDossier.nbreTc40" class="form-control" disabled>
                    </div>
                </div>

            </div>

            <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Poids brut:</label>
                                <input type="number" wire:model="editDossier.poidsBrut" class="form-control" disabled>
                            </div>

                         </div>
                         <div class="col-4">
                                <div class="form-group">
                                    <label>Nombre colis:</label>
                                    <input type="text" wire:model="editDossier.nbreColis" class="form-control" disabled>
                                </div>
                         </div>
                         
                         
                         <div class="col-6">
                            <div class="form-group">
                                <label>Client :</label>
                                <input type="text" wire:model="editDossier.libClient" class="form-control" disabled>
                            </div>
                         </div> 
                </div>

                <div class="row">
                    <div class="col-5">
                            <div class="form-group">
                                <label>Connaissement:</label>
                                <input type="text" wire:model="editDossier.connaissement" class="form-control" disabled>    
                            </div>
                    </div>
                    
                    <div class="col-7">
                                <div class="form-group">
                                    <label>Compagnie</label>
                                    <input type="text" wire:model="editDossier.nomCompagnie" class="form-control" disabled>
                                </div>
                    
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Marchandise:</label>
                            <textarea wire:model="editDossier.marchandise" class="form-control" disabled></textarea>
                        </div>
                    </div>
                </div>

           </div>
            <div class="card-footer float-right">   
                    <div>
                           <button type="button" wire:click.prevent="expnonvalid()" class="btn btn-danger">Retourner</button>

                    </div>
            </div>

        </form>
    </div>
</div>
