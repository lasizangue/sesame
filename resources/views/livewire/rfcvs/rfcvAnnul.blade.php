<div class="row p-4 pt-5">
        <div class="card card-primary" style="width:100%">
                       <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-book fa-lg"> ANNULATION RFCV</i></h3>
                </div>
        <form role= "form" wire:submit.prevent='updateRfcv()' method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                                    <label>N°Dossier</label>
                                    <select name="dosRfcv" id="dosRfcv" wire:model="editRfcv.dossier_id" class="form-control @error('editRfcv.dossier_id') is-invalid
                                    @enderror" disabled>
                                        <option value="">---------</option>
                                    @foreach($dossiers as $dossier)
                                        @if ($dossier->dateCotation!=null)
                                            <option value="{{$dossier->id}}">{{$dossier->numDossier}}</option>
                                         @endif 
                                    @endforeach
                                    </select>

                                    @error("editRfcv.dossier_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    
                        </div>
                    </div>
                     <div class="col-4">
                        <div class="form-group">
                            <label>Rfcv soumis le</label>
                            <input type="date" wire:model="editRfcv.dateRfcvSou" class="form-control @error('editRfcv.dateRfcvSou') is-invalid
                            @enderror" disabled>

                            @error("editRfcv.dateRfcvSou")
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>N°TC</label>
                            <input type="text" wire:model="editRfcv.numRfcvSoumi" class="form-control @error('editRfcv.numRfcvSoumi') is-invalid
                            @enderror" disabled>

                            @error("editRfcv.numRfcvSoumi")
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label class="mr-4 text-success"><input type="radio" wire:model="editRfcv.statut" value="Validé" class="form-control mt-3" disabled> Validé</label>
                            <label class="mr-4 text-primary"><input type="radio" wire:model="editRfcv.statut" value="Non validé" class="form-control" disabled> Non validé</label>
                            <label class="text-danger"><input type="radio" wire:model="editRfcv.statut" value="Annulé" class="form-control"> Annulé</label>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label>Motif annulation</label>
                            <textarea type="text" wire:model="editRfcv.rfcvAnnuleMotif" class="form-control" onkeyup="this.value=this.value.toUpperCase()"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-footer float-right">
                <div class="row">
                    <div>
                        @if($anHasChanged)
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