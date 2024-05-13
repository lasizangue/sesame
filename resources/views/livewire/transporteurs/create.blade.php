<div class="row p-4 pt-5">
        <div class="card card-primary" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"> <i class="fas fa-dolly fa-lg mr-2"></i>Création d'un nouveau transporteur</h3>
                </div>
        <form role= "form" wire:submit.prevent='addTransporteur()' method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Nom transporteur</label>
                            <input type="text" wire:model="newTransporteur.nomTransporteur" class="form-control @error('newTransporteur.nomTransporteur') is-invalid
                            @enderror" onkeyup="this.value=this.value.toUpperCase()">

                            @error("newTransporteur.nomTransporteur")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                    </div>
                    <div class="col-4">
                         <div class="form-group">
                            <label>Contact</label>
                            <input type="text" wire:model="newTransporteur.contacTransp" class="form-control @error('newTransporteur.contacTransp') is-invalid
                            @enderror">

                            @error("newTransporteur.contacTransp")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" wire:click.prevent="goToList()" class="btn btn-danger">Retour à la table des transporteurs</button>
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
