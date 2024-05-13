<div class="row p-4 pt-5">
        <div class="card card-primary" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-layer-group fa-lg mr-1"></i>Edition d'un détachement</h3>
                </div>
        <form role= "form" wire:submit.prevent='editDetachement()' method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Désignation détachement</label>
                    <input type="text" wire:model="editDetachement.nomDetachement" class="form-control @error('editDetachement.nomDetachement') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("editDetachement.nomDetachement")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click.prevent="goToTableDetachements()" class="btn btn-danger">Retourner à la table des détachements</button>
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
