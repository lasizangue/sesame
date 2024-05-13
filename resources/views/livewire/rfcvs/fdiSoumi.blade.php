<div class="row p-4 pt-5">
        <div class="card card-success" style="width:100%">
                       <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-book fa-lg"> FDI SOUMIS</i></h3>
                </div>
        <form role= "form" wire:submit.prevent='updateFdi()'>
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                                    <label>N°Dossier</label>
                                    <select name="dosFdi" id="dosFdi" wire:model="editFdi.dossier_id" class="form-control @error('editFdi.dossier_id') is-invalid
                                    @enderror">
                                        <option value="">---------</option>
                                    @foreach($dossiers as $dossier)
                                        @if ($dossier->dateCotation!=null)
                                            <option value="{{$dossier->id}}">{{$dossier->numDossier}}</option>
                                         @endif 
                                    @endforeach
                                    </select>

                                    @error("editFdi.dossier_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Fdi soumis le</label>
                            <input type="date" wire:model="editFdi.dateFdiSou" class="form-control @error('editFdi.dateFdiSou') is-invalid
                            @enderror">

                            @error("editFdi.dateFdiSou")
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                    
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>N°TC</label>
                            <input type="text" wire:model="editFdi.numFdiSoumi" class="form-control text-uppercase @error('editFdi.numFdiSoumi') is-invalid
                            @enderror" onkeyup="this.value=this.value.toUpperCase()">

                            @error("editFdi.numFdiSoumi")
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Observation</label>
                            <textarea type="text" wire:model="editFdi.observFdi" class="form-control" onkeyup="this.value=this.value.toUpperCase()"></textarea>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group mt-3">
                            <label class="mr-4 text-success"><input type="radio" wire:model="editFdi.statut" value="Validé" class="form-control mt-3" disabled> Validé</label>
                            <label class="mr-4 text-primary"><input type="radio" wire:model="editFdi.statut" value="Non validé" class="form-control"> Non validé</label>
                            <label class="text-danger"><input type="radio" wire:model="editFdi.statut" value="Annulé" class="form-control" disabled> Annulé</label>
                        </div>
                    </div>
                    
                </div>
                
            <div class="card-footer float-right">
                <div class="row">
                    <div>
                        @if ($editFdiHasChanged)
                            <button type="submit" class="btn btn-primary mr-2">Valider les modifications</button>
                        @endif
                    </div>
                    <div> 
                        <button type="button" wire:click.prevent="retour()" class="btn btn-danger">Retour</button>
                    </div>
                </div>

             </div>
          </form>
        </div>
</div>

 