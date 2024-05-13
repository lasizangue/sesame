<div class="modal fade" id="modalAddFdi" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  bg-success">
                    <h5 class="modal-title" style="width:100%;">CREATION DE DOCUMENT FDI </h5>
                </div>

                <form  wire:submit.prevent="addFdi()">
                    @csrf
                  <div class="modal-body">
                    <div class="row">
                    
                    <div class="col-3 ml-3">
                        <div class="form-group">
                            <label>Fdi soumis le</label>
                            <input type="date" wire:model="vDateFdiSou" class="form-control @error('vDateFdiSou') is-invalid
                            @enderror">

                            @error("vDateFdiSou")
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                    
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Numéro TC</label>
                            <input type="text" wire:model="vNumFdiSoumi" class="form-control @error('vNumFdiSoumi') is-invalid
                            @enderror" onkeyup="this.value=this.value.toUpperCase()">

                            @error("vNumFdiSoumi")
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                    
                        </div>
                    </div>
                
                    <div class="col-4">
                                <div class="form-group">
                                    <label>N°Dossier (coté)</label>
                                    <select name="dos" id="dos" wire:model="vDossier_id_fdi" class="form-control @error('vDossier_id_fdi') is-invalid
                                    @enderror">
                                        <option value="">---------</option>
                                    @foreach($dossiers as $dossier)
                                        @if ($dossier->dateCotation!=null)
                                            <option value="{{$dossier->id}}">{{$dossier->numDossier}}</option>
                                         @endif 
                                    @endforeach
                                    </select>

                                    @error("vDossier_id_fdi")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    
                                </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7 ml-3">
                        <div class="form-group">
                            <label>Observation</label>
                            <textarea type="text" wire:model="vObservFdi" class="form-control" onkeyup="this.value=this.value.toUpperCase()"></textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-3">
                            <label class="mr-4 text-success"><input type="radio" wire:model="statut_fdi" value="Validé" class="form-control mt-3" disabled> Validé</label>
                            <label class="mr-4 text-primary"><input type="radio" wire:model="statut_fdi" value="Non validé" class="form-control" disabled > Non validé</label>
                            <label class="text-danger"><input type="radio" wire:model="statut_fdi" value="Annulé" class="form-control" disabled > Annulé</label>
                        </div>
                    </div>
                    
                </div>

               
                </div>
                
                    <div class="modal-footer">
                      @if($ajoutButtonFdi)
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Ajouter</button>
                      @endif
                    <div><button type="button" wire:click.prevent='razFdi()' class="btn btn-danger" data-bs-dismiss="modal" >Fermer</button></div>
                </div>

                </form>
            </div>
        </div>
    </div>
    <script>
    window.addEventListener("showMessageCreateFdi",event=>{
       Swal.fire({
  position: 'top-end',
  icon:"success",
  title: event.detail.message || "Opération effectuée avec succès!",
  showConfirmButton: false,
  timer: 1500
})
 })

</script>

