<div class="row p-4 pt-5">
        <div class="card card-primary" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-eye fa-lg mr-1"></i>Consultation du dossier</h3>
                </div>
        <form role= "form"  >
            @csrf
            <div class="card-body">
            
                    <div class="row">
                <div class="col-2">
                
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        
                        <input wire:model="consulDossier.numDossier" type="text"  class="form-control text-danger" disabled>

                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group" >
                        <label>Type dossier</label>
                            <input type="text" wire:model="consulDossier.typeDossier" class="form-control" disabled>     
                    </div>
                </div>
                
                <div class="col-2">
                    <div class="form-group">
                    <label>Mode transport</label>
                        <input type="text" wire:model="consulDossier.modeTransport" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-1">
                    <div class="form-group">
                    <label>Régime</label>
                        <input type="text" wire:model="consulDossier.regimeDouanier" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-1">
                    <div class="form-group">
                    <label>Ntc20'</label>
                        <input type="integer" wire:model="consulDossier.nbreTc20" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-1">
                    <div class="form-group">
                    <label>Ntc40'</label>
                        <input type="integer" wire:model="consulDossier.nbreTc40" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                    <label>Poids brut</label>
                        <input type="integer" wire:model="consulDossier.poidsBrut" class="form-control" disabled>
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-2">
                    <div class="form-group" >
                        <label>Ouvert le</label>
                        <input type="date" wire:model="consulDossier.dateOuverture" class="form-control" disabled>

                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group" >
                        <label>Date cotation</label>
                            <input type="date" wire:model="consulDossier.dateCotation" class="form-control" disabled>
                        
                    </div>
                </div>
                
                <div class="col-2">
                    <div class="form-group">
                    <label>Date validation</label>
                        <input type="date" wire:model="consulDossier.dateValidation" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                    <label>N°Déclaration</label>
                        <input type="text" wire:model="consulDossier.numDeclaration" class="form-control text-danger" disabled>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                    <label>N°Liquidation</label>
                        <input type="text" wire:model="consulDossier.numLiquidation" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                    <label>Nbre colis</label>
                        <input type="text" wire:model="consulDossier.nbreColis" class="form-control" disabled>
                    </div>
                </div>

            </div>

            <div class="row">
                  <div class="col-2">
                    <div class="form-group">
                    <label>Connaissement</label>
                        <input type="text" wire:model="consulDossier.connaissement" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                    <label>Importateur</label>
                        <input type="text" wire:model="libImportateur" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                    <label>Compagnie</label>
                        <input type="text" wire:model="libCompagnie" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-5">
                    <div class="form-group">
                    <label>Marchandise</label>
                        <input type="text" wire:model="consulDossier.marchandise" class="form-control" disabled>
                    </div>
                </div>

                  
            </div>



            </div>

            <div class="card-footer float-right">
                <button type="button" wire:click.prevent="goToTableConsul()" class="btn btn-danger">Retour à la table des conteneurs</button>
             </div>

        </form>
    </div>
</div>

{{--Interception du message de création--}}
<script>
    window.addEventListener("showSuccesMessageEdit",event=>{
       Swal.fire({
  position: 'top-end',
  icon:"success",
  title: event.detail.message || "Opération effectuée avec succès!",
  showConfirmButton: false,
  timer: 1500
})
 })

</script>
