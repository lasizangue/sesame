<div class="row p-4 pt-5">
        <div class="card card-primary" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-layer-group fa-lg mr-1"></i>Edition d'un service</h3>
                </div>
        <form role= "form" wire:submit.prevent='editService()' method="POST">
            @csrf
            
            <div class="card-body">
                <div class="form-group">
                    <label>Désignation service</label>
                    <input type="text" wire:model="editService.nomService" class="form-control @error('editService.nomService') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("editService.nomService")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click.prevent="goToTableServices()" class="btn btn-danger">Retourner à la table des détachements</button>
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
