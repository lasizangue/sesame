<div class="row p-4 pt-5">
        <div class="card card-primary" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-building fa-lg mr-1"></i>Edition d'une compagnie</h3>
                </div>
        <form role= "form" wire:submit.prevent='editCompagnie()' method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Désignation compagnie</label>
                    <input type="text" wire:model="editCompagnie.nomCompagnie" class="form-control @error('editCompagnie.nomCompagnie') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("editCompagnie.nomCompagnie")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click.prevent="goToTableCompagnies()" class="btn btn-danger">Retourner à la table des compagnies</button>
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
