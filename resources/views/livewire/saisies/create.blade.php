@if ($vCreate)
<div class="row px-4 py-0 mt-4">
        <div class="card card-info" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-building fa-lg mr-1"></i>Création d'une nouvelle compagnie</h3>
                </div>
        <form role= "form" wire:submit.prevent='addCompagnie()' method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Désignation compagnie</label>
                    
                    <div class="row">
                        <div class="col-8">
                            <input type="text" wire:model="newCompagnie.nomCompagnie" class="form-control  @error('newCompagnie.nomCompagnie') is-invalid
                             @enderror" onkeyup="this.value=this.value.toUpperCase()">

                            @error("newCompagnie.nomCompagnie")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4 ">
                            <button type="submit" class="btn btn-info">Enregistrer</button>
                            <button type="button" wire:click.prevent="goToListe()" class="btn btn-danger">Retour</button>
                        </div> 
                   </div>
                    
                </div>
            </div>

        </form>
    </div>
    
</div>
@endif

@if ($vEdit)
<div class="row px-4 py-0 mt-4">
        
    <div class="card card-dark" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-building fa-lg mr-1"></i>Mise à jour d'une compagnie</h3>
                </div>
        <form role= "form" wire:submit.prevent='editCompagnie()' method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Désignation compagnie</label>
                    
                    <div class="row">
                        <div class="col-8">
                            <input type="text" wire:model="editCompagnie.nomCompagnie" class="form-control  @error('editCompagnie.nomCompagnie') is-invalid
                             @enderror" onkeyup="this.value=this.value.toUpperCase()">

                            @error("editCompagnie.nomCompagnie")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <div class="row">
                                @if ($editHasChangedCompa)
                                    <div ><button type="submit" class="btn btn-dark">Enregistrer</button></div>
                                @endif
                                
                                <div class="ml-2"><button type="button" wire:click.prevent="goToListe()" class="btn btn-warning">Retour</button></div>
                            </div>
                        </div> 
                   </div>
                    
                </div>
            </div>

        </form>
    </div>
    
</div>
@endif

<div class="row px-4 py-0 mt-0" >
        @include("livewire.saisies.tcompagnie")
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
