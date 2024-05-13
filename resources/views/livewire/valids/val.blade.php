<div class="modal fade" id="modalVal" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  bg-primary">
                    <h5 class="modal-title" style="width:100%;">Validation du dossier n° : {{$find}} </h5>
                </div>
                <form  wire:submit.prevent="majDossier()">
                    @csrf
                  <div class="modal-body">
                    <div class="row">
                                <div class="col-3">
                                    <div class="form-group" >
                                            <label>N°Dossier</label>
                                            <input type="text" wire:model="vNumDossier" class="form-control @error('vNumDossier') is-invalid
                                            @enderror" disabled>

                                            @error("vNumDossier")
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group" >
                                        <label>Type dossier</label>
                                        <input type="text" wire:model="vTypeDossier" class="form-control @error('vTypeDossier') is-invalid
                                        @enderror" disabled>

                                        @error("vTypeDossier")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Client</label>
                                            <input type="text" wire:model="vClientVal" class="form-control @error('vClientVal') is-invalid
                                            @enderror" disabled>

                                            @error("vClientVal")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>        
                     </div>
                     <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>N°Déclaration</label>
                            <input type="text" wire:model="vNumDeclaration" class="form-control text-uppercase @error('vNumDeclaration') is-invalid
                            @enderror text-success" onkeyup="this.value=this.value.toUpperCase()">

                            @error("vNumDeclaration")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>N°Liquidation</label>
                                <input type="text" wire:model="vNumLiquidation" class="form-control text-uppercase @error('vNumLiquidation') is-invalid
                                @enderror text-success" onkeyup="this.value=this.value.toUpperCase()">

                                @error("vNumLiquidation")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                </div>
                <div class="col-4">
                        <div class="form-group">
                             <label>Validé le</label>
                             <input type="date" wire:model="vDateValid" class="form-control @error('vDateValid') is-invalid
                                @enderror text-success">

                               @error("vDateValid")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                </div> 
            </div>
            <div class="row">
                    <div class="col-6">
                            <div class="form-group">
                                <label>Montant de la déclaration</label>
                                <input type="number" wire:model="vMontanDec" class="form-control @error('vMontanDec') is-invalid
                                @enderror" >
                                
                                @error("vMontanDec")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Montant de la déclaration formaté</label>
                                <input type="text" wire:model="vMontanForma" class="form-control" disabled>
                            </div>
    
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Circuit</label>
                                    <select  wire:model="vCircuit" class="form-control @error('vCircuit') is-invalid
                                @enderror">
                                    <option value="">Veuillez sélectionner un circuit ...</option>
                                    <option value="POST CONTROLE">POST CONTROLE</option>
                                    <option value="SCANNER">SCANNER</option>
                                    <option value="VAD">VAD</option>
                                    <option value="VAQ">VAQ</option>
                                    <option value="VERT">VERT</option>
                                    <option value="VISITE ANNEXE">VISITE ANNEXE</option>
                                    <option value="CIRCUIT ROUGE">CIRCUIT ROUGE</option>
                                    <option value="QUAY CONTROL">QUAY CONTROL</option>
                                    <option value="VERT SCANNER">VERT SCANNER</option>
                                    <option value="JAUNE POST CONTROL">JAUNE POST CONTROL</option>
                                    <option value="ROUGE SCANNER">ROUGE SCANNER</option>
                                                
                                    </select>

                                    @error("vCircuit")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                       
                            </div>
                         </div>  
                </div>  
       
            </div>
            <div class="modal-footer">
                    
                        <div class="row">
                            <div class="mr-2"> 
                                    @if($editHasChanged)
                                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal" >Ajouter </button>
                                    @endif
                                    
                            </div>
                            <div>
                                <button type="button" wire:click.prevent='showButtonfalse()' class="btn btn-danger" data-bs-dismiss="modal" >Fermer</button>
                            </div>
                        </div>
                   </div>

                </form>

            </div>
        </div>
    </div>
  
