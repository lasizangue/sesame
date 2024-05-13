<div class="row p-4 pt-5">
        <div class="card card-primary" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-warehouse fa-lg mr-1"></i>Création d'un nouveau acconier</h3>
                </div>
        <form role= "form" wire:submit.prevent='addAcconier()' method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                    <label>Désignation acconier</label>
                    <input type="text" wire:model="newAcconier.nomAcconier" class="form-control @error('newAcconier.nomAcconier') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("newAcconier.nomAcconier")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
                </div>
                    <div class="col-6">
                        <div class="form-group">
                                   <label>Type</label>
                                   <select name="conteneuri" id="conteneuri" wire:model="newAcconier.typeAcconier" class="form-control @error('newAcconier.typeAcconier') is-invalid
                                   @enderror" >
                                   <option value="">---------</option>
                                   <option value="TC Plein">TC Plein</option>
                                   <option value="Degroupage">Degroupage</option>
                                   </select>

                                    @error("newAcconier.typeAcconier")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    
                                </div>
                    </div>
              </div>
                
            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" wire:click.prevent="goToTableAcconier()" class="btn btn-danger">Retour à la table des acconiers</button>
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


                                
                       