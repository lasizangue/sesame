@if ($vCreate)
<div class="row px-4 py-0 mt-4">
        <div class="card card-primary" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-building fa-lg mr-1"></i>Création d'un bureau</h3>
                </div>
        <form role= "form" wire:submit.prevent='addBuro()' method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    
                    <div class="row">
                        <div class="col-2">
                           
                            <input type="text" wire:model="newBuro.code" class="form-control  @error('newBuro.code') is-invalid
                             @enderror" placeholder="Code">

                            @error("newBuro.code")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" wire:model="newBuro.libelle" class="form-control  @error('newBuro.libelle') is-invalid
                             @enderror" onkeyup="this.value=this.value.toUpperCase()" placeholder="Libellé bureau">

                            @error("newBuro.libelle")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="button" wire:click.prevent="retour()" class="btn btn-danger">Retour</button>
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
        
    <div class="card card-info" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-building fa-lg mr-1"></i>Mise à jour du bureau</h3>
                </div>
        <form role= "form" wire:submit.prevent='editBuro()' method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Code</label>
                    
                    <div class="row">
                        <div class="col-2">
                            <input type="text" wire:model="editBuro.code" class="form-control  @error('editBuro.code') is-invalid
                            @enderror" >

                            @error("editBuro.code")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" wire:model="editBuro.libelle" class="form-control  @error('editBuro.libelle') is-invalid
                            @enderror" onkeyup="this.value=this.value.toUpperCase()">

                            @error("editBuro.libelle")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <div class="row">
                                @if ($editHasChanged)
                                    <div ><button type="submit" class="btn btn-info">Enregistrer</button></div>
                                @endif
                                
                                <div class="ml-2"><button type="button" wire:click.prevent="retour()" class="btn btn-warning">Retour</button></div>
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
        @include("livewire.operationnels.tburo")
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

{{--Interception du message de création--}}
<script>
    window.addEventListener("showMessageDeleteBureau",event=>{
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
