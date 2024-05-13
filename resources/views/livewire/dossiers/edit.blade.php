<div class="row p-4 pt-5">
        <div class="card card-primary" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-folder-plus fa-lg mr-1"></i>Mise à jour du dossier</h3>
                </div>
             
        <form role= "form" wire:submit.prevent='updateDossier()' method="POST">
            @csrf
            
        <div class="card-body" >
            <div class="row">
                <div class="col-4">
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control @error('editDossier.numDossier') is-invalid
                        @enderror">

                        @error("editDossier.numDossier")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" >
                        <label>Type dossier</label>
                            <select wire:model="editDossier.typeDossier" class="form-control @error('editDossier.typeDossier') is-invalid
                        @enderror">
                        <option value="">---------</option>
                        <option value="Import">Import</option>
                        <option value="Export">Export</option>
                        </select>

                        @error("editDossier.typeDossier")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group">
                    <label>Mode transport</label>
                        <select wire:model="editDossier.modeTransport" class="form-control @error('editDossier.modeTransport') is-invalid
                     @enderror">
                        <option value="">---------</option>
                        <option value="Aérien">Aérien</option>
                        <option value="Ferroviaire">Ferroviaire</option>
                        <option value="Maritime">Maritime</option>
                        <option value="Terrestre">Terrestre</option>
                        </select>

                        @error("editDossier.modeTransport")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-3">
                        <div class="form-group">
                        <label>Date ouvert.</label>
                        <input type="date" wire:model="editDossier.dateOuverture" class="form-control @error('editDossier.dateOuverture') is-invalid
                        @enderror">

                        @error("editDossier.dateOuverture")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                <div class="col-3">
                <div class="form-group">
                    <label>Régime douanier</label>
                        <select wire:model="editDossier.regimeDouanier" class="form-control @error('editDossier.regimeDouanier') is-invalid
                     @enderror">
                        <option value="">Choisir ...</option>
                        <option value="D3">D3</option>
                        <option value="D3 AT">D3 AT</option>
                        <option value="D3 SEF">D3 SEF</option>
                        <option value="D11">D11</option>
                        <option value="D15">D15</option>
                        <option value=" D18 Admission Temporaire Directe"> D18 Admission Temporaire Directe</option>

                        <option value="D6">D6</option>
                        <option value="D8">D8</option>
                        <option value="D25">D25</option>
                        <option value="D25 SEF">D25 SEF</option>
                        <option value="D25 SEF Suite d'Entrepôt">D25 SEF Suite d'Entrepôt</option>
                        <option value="D53">D53</option>
                        <option value="D56">D56</option>
                        <option value="D66">D66</option>
                        </select>

                        @error("editDossier.regimeDouanier")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                        <div class="form-group">
                            <label>Nombre TC 20':</label>
                            <input type="number" wire:model="editDossier.nbreTc20" class="form-control @error('editDossier.nbreTc20') is-invalid
                            @enderror">
                            @error("editDossier.nbreTc20")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                         <label>Nombre TC 40':</label>
                        <input type="number" wire:model="editDossier.nbreTc40" class="form-control @error('editDossier.nbreTc40') is-invalid
                        @enderror">
                        @error("editDossier.nbreTc40")
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Poids brut:</label>
                                <input type="number" wire:model="editDossier.poidsBrut" class="form-control @error('editDossier.poidsBrut') is-invalid
                                        @enderror">
                                @error("editDossier.poidsBrut")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                         </div>
                         <div class="col-4">
                                <div class="form-group">
                                    <label>Nombre colis:</label>
                                    <input type="text" wire:model="editDossier.nbreColis" class="form-control @error('editDossier.nbreColis') is-invalid
                                            @enderror" onkeyup="this.value=this.value.toUpperCase()">
                                    @error("editDossier.nbreColis")
                                                <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                         </div>
                         
                         
                         <div class="col-6">
                            <div class="form-group">
                                <label>Importateur:</label>
                                <select name="client" id="client"  wire:model="vClient_id" class="form-control @error('vClient_id') is-invalid
                                @enderror" >
                                <option value="">---------</option>
                               @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{    $client->raisonSocial }}</option>
                                    @endforeach
                            
                                </select>
                                @error("vClient_id")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                         </div> 
                </div>

                <div class="row">
                    <div class="col-5">
                            <div class="form-group">
                            <label>Connaissement:</label>
                            <input type="text" wire:model="editDossier.connaissement" class="form-control @error('editDossier.connaissement') is-invalid
                                    @enderror" onkeyup="this.value=this.value.toUpperCase()">
                            @error("editDossier.connaissement")
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror

                            </div>
                    </div>
                    
                    <div class="col-7">
                                <div class="form-group">
                                    <label>Compagnie</label>
                                    <select name="compagnie" id="compagnie" wire:model="vCompagnie_id" class="form-control @error('vCompagnie_id') is-invalid
                                    @enderror">
                                        <option value="">---------</option>
                                    @foreach($compagnies as $compagnie)
                                        <option value="{{$compagnie->id}}">{{$compagnie->nomCompagnie}}</option>
                                    @endforeach
                                    </select>

                                    @error("vCompagnie_id")
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
                                @enderror" onkeyup="this.value=this.value.toUpperCase()"></textarea>
                            @error("editDossier.marchandise")
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

           </div>
            <div class="card-footer float-right">
                <div class="row">
                   @if ($editHasChanged)
                        <div class="mr-2">
                            <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                        </div>
                    @endif
                    <div>
                    <div>
                        <button type="button" wire:click.prevent="goToTableDossiers()"    class="btn btn-danger">Retourner à la liste des dossiers</button>
                    </div></div>
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
