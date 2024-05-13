<div class="row p-4 pt-5">
        <div class="card @if ($mise=="m")
            card-indigo
        @endif
        @if ($mise=="p")
            card-success
        @endif

        " style="width:100%">
                <div class="card-header">
                   
                    <h2 class="card-title"><i class="fas fa-file-alt mr-1"></i>@if ($mise=="p")
                        Fiche de préparation de mise en livraison
                    @endif
                    @if ($mise=="m")
                        Fiche de mise en livraison
                    @endif
                </h2> 
                     @if ($mise=="p")
                         @if ($editDossier["typeChargement"]!="Vrac" && $editDossier["typeChargement"]!="" && ($countV!=null || $countQ!=null))
                        <button type="button" wire:click.prevent="printPrepa()" class="btn btn-link float-right text-white">Imprimer</button>
                        @else
                        <div class="badge bg-danger float-right">TypeChargement incompatible ou saisir le(s) TC(s) !</div>
                    @endif    
                 @endif      
                </div>
        <form role= "form" wire:submit.prevent='updateDossier()'>
            @csrf
            <div class="card-body">
                <div class="row">
                <div class="col-3">
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
                        <label>Date de reception</label>
                        <input type="date" wire:model="vDateReception" class="form-control" disabled>

                        </div>
                    </div>

                     <div class="col-5">
                                <div class="form-group">
                                    <label>Compagnie</label>
                                        <select name="compagnie" id="compagnie" wire:model="editDossier.compagnie_id"           class="form-control @error('editDossier.compagnie_id') is-invalid
                                        @enderror" disabled>

                                        <option value="">---------</option>
                                            @foreach($compagnies as $compagnie)
                                                <option value="{{$compagnie->id}}">{{$compagnie->nomCompagnie}}</option>
                                            @endforeach
                                        </select>

                                        @error("editDossier.compagnie_id")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                    
                                </div>
                    </div>
            </div>
            
            <div class="row">
               <div class="col-4">
                            <div class="form-group">
                                <label>Navire</label>
                                <input type="text" wire:model="editDossier.navire" class="form-control @error('editDossier.navire') is-invalid
                                        @enderror" onkeyup="this.value=this.value.toUpperCase()" @if ($mise=="m")
                                            disabled
                                        @endif>
                                @error("editDossier.navire")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                 </div>
                
          
                 <div class="col-3">
                            <div class="form-group">
                                <label>Date arrivée</label>
                                <input type="date" wire:model="editDossier.dateNavire" class="form-control @error('editDossier.dateNavire') is-invalid
                                        @enderror"  @if ($mise=="m")
                                            disabled
                                        @endif>
                                @error("editDossier.dateNavire")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                  </div>

                  <div class="col-5">
                            <div class="form-group">
                                <label>Mode livraison</label>
                                <select name="modliv" id="modliv" wire:model="editDossier.modeLivraison" class="form-control @error('editDossier.modeLivraison') is-invalid @enderror"  @if ($mise=="m")
                                            disabled
                                        @endif>
                                <option value="">---------</option>
                                <option value="AUTOCHARGEUSE">AUTOCHARGEUSE</option>
                                <option value="REMORQUE">REMORQUE</option>
                                <option value="PROPRE MOYEN">PROPRE MOYEN</option>
                               </select>

                                @error("editDossier.modeLivraison")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                 </div>
            </div>

            <div class="row">
                    <div class="col-4">
                          <div class="form-group">
                                <label>Port de chargement</label>
                                <input type="text" wire:model="editDossier.port" class="form-control @error('editDossier.port') is-invalid
                                        @enderror" onkeyup="this.value=this.value.toUpperCase()"  @if ($mise=="m")
                                            disabled
                                        @endif>
                                 @error("editDossier.port")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                    </div>
                    
                    <div class="col-8">
                        <div class="form-group">
                            <label >Lieu de livraison</label>
                            <textarea wire:model="editDossier.lieu" class="form-control @error('editDossier.lieu') is-invalid
                                        @enderror " onkeyup="this.value=this.value.toUpperCase()"  @if ($mise=="m")
                                            disabled
                                        @endif></textarea>
                             @error("editDossier.lieu")
                                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            
                        </div>
                    </div>
                
          </div>
            
          <div class="row">
                    <div class="col-4">
                          <div class="form-group">
                                <label>Type de chargement</label>
                                <select name="typechargemen" id="typechargemen" wire:model="editDossier.typeChargement" class="form-control @error('editDossier.typeChargement') is-invalid @enderror" disabled>

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

                    @if($mise=="p")
                    <div class="col-4">
                          <div class="form-group">
                                <label class="text-danger">Date mise en livraison</label>
                                <input type="date" wire:model="dateMiseLivraison" class="form-control " style="border-color: red;" disabled>  
                            </div>
                    </div>
                    @endif

                    @if($mise=="m")
                    <div class="col-4">
                          <div class="form-group">
                                <label class="text-danger">Date mise en livraison</label>
                                <input type="date" wire:model="dateMiseLivraison" class="form-control " style="border-color: red;" >  
                            </div>
                    </div>
                    @endif

                    <div class="col-4">
                          <div class="form-group">
                                <label>Date ordre de livraison</label>
                                <input type="date" wire:model="vDateOrdreLivraison" class="form-control " disabled>
                                
                            </div>
                    </div>
                
          </div>
          <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                                    <label>Transporteur</label>
                                        <select name="transporteur" id="transporteur" wire:model="editDossier.transporteur_id"           class="form-control @error('editDossier.transporteur_id') is-invalid
                                        @enderror"  @if ($mise=="m")
                                            disabled
                                        @endif>

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

                    <div class="col-7">
                        <div class="form-group">
                                    <label>Acconier</label>
                                        <select name="acconier" id="acconier" wire:model="editDossier.acconier_id"           class="form-control @error('editDossier.acconier_id') is-invalid
                                        @enderror"  @if ($mise=="m")
                                            disabled
                                        @endif>

                                        <option value="">---------</option>
                                            @foreach($acconiers as $acconier)
                                                <option value="{{$acconier->id}}">{{$acconier->nomAcconier}}</option>
                                            @endforeach
                                        </select>

                                        @error("editDossier.acconier_id")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                    
                                </div>
                    </div>
          </div>
          <div class="row">
            @if ($vtypeAcc=="TC Plein")
            <div class="col-4">
                        <div class="form-group">
                                    <label>Terminal</label>
                                        <select name="terminal" id="terminal" wire:model="editDossier.terminal"           class="form-control @error('editDossier.terminal') is-invalid
                                        @enderror"  @if ($mise=="m")
                                            disabled
                                        @endif>

                                        <option value="">---------</option>
                                            
                                        <option value="Abidjan terminal">Abidjan terminal</option>
                                        <option value="CI terminal">CI terminal</option>
                                            
                                        </select>

                                        @error("editDossier.terminal")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                    
                                </div>
                    </div>
            <div class="col-8">
                        <div class="form-group">
                            <label >Observations</label>
                            <textarea wire:model="obMiseLivraison" class="form-control " onkeyup="this.value=this.value.toUpperCase()"></textarea>
                            
                        </div>
                    </div>
                @else
                <div class="col-12">
                        <div class="form-group">
                            <label >Observations</label>
                            <textarea wire:model="obMiseLivraison" class="form-control " onkeyup="this.value=this.value.toUpperCase()"></textarea>
                            
                        </div>
                    </div>
            @endif
          </div>
        </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn bg-indigo">Valider la fiche</button>
                <button type="button" wire:click.prevent="goToEffectuer()" class="btn btn-danger">Retour</button>
             </div>

        </form>
    </div>
</div>

{{--Interception du message de création--}}
<script>
    window.addEventListener("showSuccesMessageEdit",event=>{
       Swal.fire({
  title: event.detail.message || "Opération effectuée avec succès!",
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
})
 })

</script>






