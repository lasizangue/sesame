
     <div class="row p-4 pt-5">
        <div class="col-6">
        
            <div class="card card-primary" >
                            <div class="card-header bg-success">
                                <h3 class="card-title"><i class="fas fa-sign-in-alt fa-lg mr-2"></i>Liste des cotations</h3>
                            </div>
                    
                    <div class="card-body table-responsive p-0 table-striped table-hover" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th style="width:20%" >N°Dossier</th>
                                <th style="width:20%" >Date cotation</th>
                                <th style="width:40%" class="text-center">Agent</th>
                                <th style="width:20%" class="text-center">Client</th>
                            </tr>
                        </thead>
            <tbody>
        
                @foreach($dossiers as $dossier)
                    @if ($dossier->dateCotation!="")
                <tr>
                    <td>{{$dossier->numDossier}}</td>
                    <td>{{$dossier->dateCotation}}</td>
                    <td class="text-center">{{$dossier->agentCotation}}  </td>
                    
                    <td>{{$dossier->libClient}}</td>
                   
                </tr>
                    @endif
                @endforeach

            </tbody>
            </table>

            </div>
            
                    <div class="card-footer">
                        <div class="float-right">

                        </div>   
                    </div>
            </div>  
        </div>
    
        <div class="col-6">
            <form role= "form" wire:submit.prevent='updateDossier()' method="POST">
                 @csrf
            <div class="card card-primary" >
                
                <div class="card-body" style="height: 308px;">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            
                                <div class="input-group mt-3 mb-3">
                                    <input type="text" wire:model.lazy="search" class="form-control form-control-lg" placeholder="N°Dossier à coter" style="border:solid 2px; border-color:green;">
                       
                                    <div class="input-group-append">
                                        <button  wire:click.prevent='rechercheDossier()' class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                           

                        </div>
                    </div>


                    <div class="row">
                                <div class="col-6">
                                        <div class="form-group">
                                        <label>N°Dossier:</label>
                                        <input type="text" wire:model="editDossier.numDossier" class="form-control text-danger @error('editDossier.numDossier') is-invalid
                                                @enderror" disabled >
                                        @error("editDossier.numDossier")
                                                    <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Date cotation:</label>
                                    <input type="date" wire:model="vDateCotation" class="form-control @error('vDateCotation') is-invalid
                                            @enderror" @if($dossierTrouve==false) disabled @endif>
                                    @error("vDateCotation")
                                                <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                    </div>

                    <div class="row">
                    
                                <div class="col-8">
                                        <div class="form-group">
                                        <label>Nom de l'agent</label>
                                        <select name="agent" id="agent" wire:model="editDossier.agentCotation" class="form-control @error('editDossier.agentCotation') is-invalid
                                        @enderror" @if($dossierTrouve==false) disabled @endif>
                                        <option value="">---------</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->nom}} {{$user->prenom}}" class="bg-indigo">{{$user->nom}} {{"--"}} {{$user->prenom}} {{ "--" }} {{$user->matricule}}</option>
                                            @endforeach
                                        </select>

                                            @error("editDossier.agentCotation")
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                            
                                        </div>
                            
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                   <label>Conteneurisation</label>
                                   <select name="conteneuri" id="conteneuri" wire:model="editDossier.typeChargement" class="form-control @error('editDossier.typeChargement') is-invalid
                                   @enderror" @if($dossierTrouve==false) disabled @endif>
                                   <option value="">---------</option>
                                   <option value="TC Plein">TC Plein</option>
                                   <option value="Vrac">Vrac</option>
                                   <option value="Degroupage">Degroupage</option>
                                   <option value="Autre">Autre</option>
                                   </select>

                                    @error("editDossier.typeChargement")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    
                                </div>
                        </div>
                    </div>
                    </div>
                       
                    <div class="card-footer">
                            <div class=" float-right">
                                
                                    <button type="submit"  class="btn btn-success">Valider la cotation</button>
                                        
                            </div>
                    </div>
                  
            </div>
            </form>
            </div>
            </div>
        </div>
              

{{--Interception du message de création--}}
<script>
    window.addEventListener("showSuccesMessageCot",event=>{
       Swal.fire({
  position: 'top-end',
  icon:"success",
  title: event.detail.message || "Opération effectuée avec succès!",
  showConfirmButton: false,
  timer: 1500
})
 })

</script>


<script>
    window.addEventListener("showSuccesMessageRech",event=>{
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

<script>
    window.addEventListener("showSuccesMessagePcot",event=>{
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

<script>
    window.addEventListener("showSuccesAucun",event=>{
       Swal.fire({
  position: 'top-end',
  icon:"success",
  title: event.detail.message || "Opération effectuée avec succès!",
  showConfirmButton: false,
  timer: 1500
})
 })

</script>









