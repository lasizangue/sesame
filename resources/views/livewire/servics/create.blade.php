<div class="row p-4 pt-5" >
        <div class="card card-primary" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="fab fa-servicestack fa-lg mr-1"></i>Création d'un nouveau service</h3>
                </div>
        <form role= "form" wire:submit.prevent='addService()' method="POST">
            @csrf
            
            <div class="card-body">
                <div class="form-group">
                    <label>Désignation service</label>
                    <input type="text" wire:model="newService.nomService" class="form-control @error('newService.nomService') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("newService.nomService")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" wire:click.prevent="goToTableServices()" class="btn btn-danger">Retourner à la table des services</button>
             </div>

        </form>
    </div>
</div>

{{--Interception du message de création--}}
<script>
    window.addEventListener("showSuccesMessage",event=>{
       Swal.fire({
  position: 'top-end',
  icon:"success",
  title: event.detail.message || "Opération effectuée avec succès!",
  showConfirmButton: false,
  timer: 1500
})
 })

</script>
