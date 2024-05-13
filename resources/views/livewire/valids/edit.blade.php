<div class="row p-4 pt-5">
        <div class="card card-success" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-folder-plus fa-lg mr-1"></i>Mise à jour de la validation</h3>
                </div>
             
        <form role= "form" wire:submit.prevent='updateDossier()' method="POST">
            @csrf
            
        <div class="card-body" >
            <div class="row">
                <div class="col-4">
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control @error('editDossier.numDossier') is-invalid
                        @enderror" disabled>

                        @error("editDossier.numDossier")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" >
                        <label>Type dossier</label>
                        <input type="text" wire:model="editDossier.typeDossier" class="form-control @error('editDossier.typeDossier') is-invalid
                        @enderror" disabled>

                        @error("editDossier.typeDossier")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group">
                    <label>Client</label>
                        <input type="text" wire:model="vClient" class="form-control @error('vClient') is-invalid
                        @enderror" disabled>

                        @error("vClient")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-4">
                        <div class="form-group">
                        <label>N°Déclaration</label>
                        <input type="text" wire:model="editDossier.numDeclaration" class="form-control @error('editDossier.numDeclaration') is-invalid
                        @enderror text-success" onkeyup="this.value=this.value.toUpperCase()">

                        @error("editDossier.numDeclaration")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>N°Liquidation</label>
                            <input type="text" wire:model="editDossier.numLiquidation" class="form-control @error('editDossier.numLiquidation') is-invalid
                            @enderror text-success" onkeyup="this.value=this.value.toUpperCase()">

                            @error("editDossier.numLiquidation")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-4">
                        <div class="form-group">
                             <label>Validé le</label>
                             <input type="date" wire:model="editDossier.dateValidation" class="form-control @error('editDossier.dateValidation') is-invalid
                            @enderror text-success">

                            @error("editDossier.dateValidation")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-6">
                            <div class="form-group">
                                <label>Montant de la déclaration</label>
                                <input type="number" wire:model="vMontanDeclaration" class="form-control @error('vMontanDeclaration') is-invalid
                                @enderror" >
                                
                                @error("vMontanDeclaration")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Montant de la déclaration formaté</label>
                                <input type="text" wire:model="vMontanFormat" class="form-control" disabled>
                            </div>
    
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Circuit</label>
                                    <select  wire:model="editDossier.circuit" class="form-control">
                                    <option value="">Veuillez sélectionner un circuit ...</option>
                                    <option value="POST CONTROLE">POST CONTROLE</option>
                                    <option value="SCANNER">SCANNER</option>
                                    <option value="VAD">VAD</option>
                                    <option value="VAQ">VAQ</option>
                                    <option value="VERT">VERT</option>
                                    <option value="VISITE ANNEXE">VISITE ANNEXE</option>
                                    <option value="CIRCUIT ROUGE">CIRCUIT ROUGE</option>
                                    <option value="QUAY CONTROL">QUAY CONTROL</option>
                                    <option value="VERT SCANNER">VERT SCANNER</option>
                                    <option value="JAUNE POST CONTROL">JAUNE POST CONTROL</option>
                                    <option value="ROUGE SCANNER">ROUGE SCANNER</option>
                                                
                                    </select>
                                       
                            </div>
                         </div>  
                </div>  

           </div>
            <div class="card-footer float-right">
                <div class="row">
                   @if ($HasChanged)
                        <div class="mr-2">
                            <div><button type="submit" class="btn btn-primary">Appliquer les modifications</button></div>
                        </div>
                    @endif
                    <div>
                    <div>
                        <button type="button" wire:click.prevent="goToListe()"    class="btn btn-danger">Retourner à la liste des dossiers</button>
                    </div>
                </div>
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

