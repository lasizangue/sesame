<div class="row p-4 pt-5">
        <div class="card card-success" style="width:100%">
                       <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-book fa-lg"> ANNULATION FDI</i></h3>
                </div>
        <form role= "form" wire:submit.prevent='updateFdi()' method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                                    <label>N°Dossier</label>
                                    <select name="dosFd" id="dosFd" wire:model="editFdi.dossier_id" class="form-control @error('editFdi.dossier_id') is-invalid
                                    @enderror" disabled>
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
                     <div class="col-4">
                        <div class="form-group">
                            <label>Date soumission Fdi</label>
                            <input type="date" wire:model="editFdi.dateFdiSou" class="form-control @error('editFdi.dateFdiSou') is-invalid
                            @enderror" disabled>

                            @error("editFdi.dateFdiSou")
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>N°TC</label>
                            <input type="text" wire:model="editFdi.numFdiSoumi" class="form-control text-uppercase @error('editFdi.numFdiSoumi') is-invalid
                            @enderror" disabled>

                            @error("editFdi.numFdiSoumi")
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label class="mr-4 text-success"><input type="radio" wire:model="editFdi.statut" value="Validé" class="form-control mt-3" disabled> Validé</label>
                            <label class="mr-4 text-primary"><input type="radio" wire:model="editFdi.statut" value="Non validé" class="form-control" disabled> Non validé</label>
                            <label class="text-danger"><input type="radio" wire:model="editFdi.statut" value="Annulé" class="form-control"> Annulé</label>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label>Motif annulation</label>
                            <textarea type="text" wire:model="editFdi.fdiAnnuleMotif" class="form-control" onkeyup="this.value=this.value.toUpperCase()"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-footer float-right">
              <div class="row">
                    <div>
                       @if($anFdiHasChanged)
                          <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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