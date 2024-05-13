<div class="row p-4 pt-2">
        <div class="card card-primary" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-user-graduate fa-lg mr-2"></i>Passage en douane</h3>
                </div>
        
        <form role= "form" wire:submit.prevent='updateDossier()' method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control text-danger @error('editDossier.numDossier') is-invalid
                        @enderror" disabled>

                        @error("editDossier.numDossier")
                            <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                </div>

                <div class="col-5">
                    <div class="form-group">
                        <label>Circuit</label>
                        <input type="text" wire:model="editDossier.circuit" class="form-control @error('editDossier.circuit') is-invalid
                        @enderror" disabled>

                        @error("editDossier.circuit")
                            <span class="text-danger">{{ $message }}</span>
                         @enderror
                    
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>NbreTC 20' </label>
                        <input type="integer" wire:model="editDossier.nbreTc20" class="form-control" disabled>
                    </div>
                </div>
                 <div class="col-2">
                    <div class="form-group">
                        <label>NbreTC 40' </label>
                        <input type="integer" wire:model="editDossier.nbreTc40" class="form-control" disabled>

                        @error("editDossier.nbreTc40")
                            <span class="text-danger">{{ $message }}</span>
                         @enderror
                    
                    </div>
                </div>
             </div>
             
             <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Date de passage en douane</label>
                        <input type="date" wire:model="editDossier.datePassage" class="form-control @error('editDossier.datePassage') is-invalid
                        @enderror">

                        @error("editDossier.datePassage")
                            <span class="text-danger">{{ $message }}</span>
                         @enderror
                    
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                                    <label>Bureau douane</label>
                                    <select name="buro" id="buro" wire:model="vBuro_id" class="form-control @error('vBuro_id') is-invalid
                                    @enderror">
                                        <option value="">---------</option>
                                    @foreach($buros as $buro)
                                        <option value="{{$buro->id}}">{{$buro->libelle}}</option>
                                    @endforeach
                                    </select>

                                    @error("vBuro_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    
                    </div>  
                </div>
                <div class="col-1">
                        <div class="form-group">
                            <div class="text-primary">
                                <U><b>Phyto</b></U>
                            </div>
                            <div class="form-check">
                                <label ><input type="radio" wire:model="editDossier.phyto" value="Oui" id="phyto1" class=" mr-1 @error('editDossier.phyto') is-invalid
                                @enderror">Oui</label>
                            </div>
                            <div class="form-check">
                                <label><input type="radio" wire:model="editDossier.phyto" value="Non" id="phyto2" class=" mr-1 @error('editDossier.phyto') is-invalid
                                @enderror">Non</label>
                            </div>
                        </div>
                         @error("editDossier.phyto")
                            <span class="text-danger">{{ $message }}</span>
                         @enderror                  
                </div>
                <div class="col-3">
                          <div class="form-group">
                                <label>Conteneurisation</label>
                                <select name="typechargemen" id="typechargemen" wire:model="editDossier.typeChargement" class="form-control @error('editDossier.typeChargement') is-invalid @enderror ">

                                <option value="">---------</option>
                                <option value="TC Plein">TC Plein</option>
                                <option value="Vrac">Vrac</option>
                                <option value="Degroupage">Degroupage</option>
                               </select>

                                @error("editDossier.typeChargement")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                    </div>
                 
             </div>
             
             <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Vérificateur</label>
                        <input type="text" wire:model="editDossier.verificateur" class="form-control" >

                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Date de visite</label>
                        <input type="date" wire:model="editDossier.dateVisite" class="form-control" >

                    </div>
                </div>
                <div class="col-6">
                        <div class="form-group">
                            <label >Observation:</label>
                            <textarea wire:model="editDossier.verifObserv" class="form-control" onkeyup="this.value=this.value.toUpperCase()"></textarea>
                            
                        </div>
                    </div>
             </div>
             <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Date obtention BAE</label>
                        <input type="date" wire:model="editDossier.dateBae" class="form-control">

                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>N°BAE</label>
                        <input type="text" wire:model="editDossier.nBae" class="form-control" onkeyup="this.value=this.value.toUpperCase()">
                    </div>
                </div>
                <div class="col-5">
                        <div class="form-group">
                                        <input type="file" wire:model="editPhoto" id="image{{$inputEditFileIterator}}">

                                        <input type="text" wire:model="editDossier.imageUrl" style="width: 370px;" class="mt-2" disabled>
                        </div>
                                                           
                </div>
                
             </div>
             </div>
            
            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary mr-2">Valider le passage</button>
                        <button type="button" class="btn btn-danger" wire:click.prevent='retour()'>Retour</button>
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



