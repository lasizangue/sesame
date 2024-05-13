<div class="row p-4 pt-5">
        <div class="card card-green" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-file-alt mr-1"></i>Fiche de livraison</h3>
                </div>
        <form role= "form" wire:submit.prevent='updateDossier()' method="POST">
            @csrf
            <div class="card-body">
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
                        <div class="form-group">
                        <label>Date mise en livraison</label>
                        <input type="date" wire:model="editDossier.dateMiseEnLivraison" class="form-control @error('editDossier.dateMiseEnLivraison') is-invalid
                        @enderror" disabled>

                        @error("editDossier.dateMiseEnLivraison")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                        <label>N°BL</label>
                        <input type="text" wire:model="editDossier.connaissement" class="form-control @error('editDossier.connaissement') is-invalid
                        @enderror" disabled>

                        @error("editDossier.connaissement")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                     
            </div>
            
            <div class="row">
               <div class="col-8">
                        <div class="form-group">
                                    <label>Transporteur</label>
                                        <select name="transporteur" id="transporteur" wire:model="editDossier.transporteur_id"           class="form-control @error('editDossier.transporteur_id') is-invalid
                                        @enderror" disabled>

                                        <option value="">---------</option>
                                            @foreach($transporteurs as $transporteur)
                                                <option value="{{$transporteur->id}}">{{$transporteur->nomTransporteur}}</option>
                                            @endforeach
                                        </select>

                                        @error("editDossier.transporteur_id")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                    
                                </div>
                 </div>
          
                 <div class="col-4">
                            <div class="form-group">
                                <label>Date livraison</label>
                                <input type="date" wire:model="vDateLivraison" class="form-control ">
                               
                            </div>
                  </div>

            </div>
            
          
          <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Observations</label>
                            <textarea wire:model="obMiseLivraison" class="form-control "></textarea onkeyup="this.value=this.value.toUpperCase()">
                            
                        </div>
                    </div>
                </div>
            

            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn bg-green">Appliquer les modifications</button>
                <button type="button" wire:click.prevent="goToEffectuer()" class="btn btn-danger">Retour</button>
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
  timer: 2000
})
 })

</script>

