<div class="row p-4 pt-5">
        <div class="card card-primary" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-edit fa-lg mr-1"></i>Edition d'un client</h3>
                </div>
        <form role= "form" wire:submit.prevent='updateClient()' method="POST">
            @csrf
            
            <div class="card-body">
                <div class="form-group">
                    <label>Raison social</label>
                    <input type="text" wire:model="editClient.raisonSocial" class="form-control @error('editClient.raisonSocial') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("editClient.raisonSocial")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label>Compte contribuable</label>
                    <input type="text" wire:model="editClient.compteContrib" class="form-control @error('editClient.compteContrib') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("editClient.compteContrib")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label>Adresse complète</label>
                    <input type="text" wire:model="editClient.adresse" class="form-control 
                    " onkeyup="this.value=this.value.toUpperCase()">

                </div>

                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" wire:model="editClient.contact" class="form-control 
                   ">

                </div>

            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click.prevent="goToTableClients()" class="btn btn-danger">Retourner à la table des clients</button>
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
