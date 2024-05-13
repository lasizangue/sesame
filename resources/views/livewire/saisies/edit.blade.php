<div class="row p-4 pt-0">
        <div class="card card-dark" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-folder-plus fa-lg mr-1"></i>Saisie des informations du bordereau de livraison aérien</h3>

                </div>
             
        <form role= "form" wire:submit.prevent='majDossier()' method="POST">
            @csrf
            
        <div class="card-body" >
            <div class="row">
                <div class="col-3">
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control text-danger @error('editDossier.numDossier') is-invalid
                        @enderror" disabled>

                        @error("editDossier.numDossier")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group" >
                        <label>Régime</label>
                        <input type="text" wire:model="editDossier.regimeDouanier" class="form-control @error('editDossier.regimeDouanier') is-invalid
                        @enderror" disabled>
                        
                        @error("editDossier.regimeDouanier")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                    <label>N°Déclaration</label>
                    <input type="text" wire:model="editDossier.numDeclaration" class="form-control @error('editDossier.numDeclaration') is-invalid
                        @enderror" disabled>

                        @error("editDossier.numDeclaration")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                       
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-6">
                    <div class="form-group" >
                        <label>Circuit</label>
                        <input type="text" wire:model="editDossier.circuit" class="form-control @error('editDossier.circuit') is-invalid
                        @enderror" disabled>

                        @error("editDossier.circuit")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                    <label>Client</label>
                    <select wire:model="editDossier.client_id" class="form-control @error('editDossier.client_id') is-invalid
                        @enderror" disabled>
                                <option value="">---------</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                            @endforeach
                        </select>

                        @error("editDossier.client_id")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                       
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group" >
                        <label>Poids brut</label>
                        <input type="number" wire:model="editDossier.poidsBrut" class="form-control text-danger @error('editDossier.poidsBrut') is-invalid
                        @enderror" disabled>

                        @error("editDossier.poidsBrut")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                    <label>LTA</label>
                    <input type="text" wire:model="editDossier.connaissement" class="form-control @error('editDossier.connaissement') is-invalid
                        @enderror" onkeyup="this.value=this.value.toUpperCase()">

                        @error("editDossier.connaissement")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                       
                    </div>
                </div>

            </div>

            <div class="row">
                
                <div class="col-6">
                    <div class="form-group" >
                        <label>Compagnie</label>
                            <select wire:model="vCompagnie_id" class="form-control @error('vCompagnie_id') is-invalid
                        @enderror" >
                                <option value="">---------</option>
                            @foreach ($compagnies as $compagnie)
                                <option value="{{$compagnie->id}}">{{$compagnie->nomCompagnie}}</option>
                            @endforeach
                        </select>

                        @error("vCompagnie_id")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                    <label>Vol</label>
                       <input type="text" wire:model="editDossier.vol" class="form-control @error('editDossier.vol') is-invalid
                        @enderror" onkeyup="this.value=this.value.toUpperCase()">
                        
                        @error("editDossier.vol")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-9">
                        <div class="form-group">
                        <label>Aéroport de chargement</label>
                        <input type="text" wire:model="editDossier.aeroportDepart" class="form-control @error('editDossier.aeroportDepart') is-invalid
                        @enderror" onkeyup="this.value=this.value.toUpperCase()">

                        @error("editDossier.aeroportDepart")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                <div class="col-3">
                     <div class="form-group">
                        <label>Date arrivée:</label>
                            <input type="date" wire:model="editDossier.dateArrivee" class="form-control @error('editDossier.dateArrivee') is-invalid
                            @enderror">
                            @error("editDossier.dateArrivee")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>

            </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Marchandise:</label>
                            <textarea wire:model="editDossier.marchandise" class="form-control @error('editDossier.marchandise') is-invalid
                                @enderror" disabled></textarea>
                            @error("editDossier.marchandise")
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

           </div>
            <div class="card-footer">
                <div class="row float-right">
                <div class="col-0">
                   @if ($editHasChanged)
                        
                            <button type="submit" class="btn btn-primary mr-2">Appliquer les modifications</button>
                       
                    @endif
                    
                </div>
                       
                <div class="col-0 ">
                    <button type="button" wire:click.prevent="goToListe()"    class="btn btn-danger">Retour</button>
                </div>
             </div>           
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
