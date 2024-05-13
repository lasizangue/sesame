<div class="row  ml-2 mt-2 text-secondary" >
    <h2>Dossier & conteneurs</h2>
</div>

<div class="row ml-2 mt-2" >

    <div class="card mr-3" style="width:50%">

        <div class="card-header bg-gray" >
                
                <div class="row">
                            <div class="col-6">
                                <h5 class=" mr-1 d-block flex-grow-1"><i class="nav-icon fas fa-boxes fa-lg mr-1"></i>Dossier concerné</h5>
    
                            </div>
                            
                            <div class="col-6">
                                   
                                 <div class="input-group input-group-sm">
                                 <form role="form">
                                    @csrf
                                    <div class="row">
                                        <div >
                                            <input type="text" name="table_search" wire:model.lazy="search" class="form-control mr-2"  style="width: 160px;" placeholder="Numéro de dossier">
                                        </div>
                                        <div >
                                            <button type="submit" class="btn btn-success">
                                        <i class="fas fa-search"></i>
                                        </button>
                                        </div>
                                    </div>
                                
                                </form>
            
                                </div>
                              
                            </div>
                    </div>                   
                </div>

        <div class="card-body table-responsive p-0 table-striped">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:35%;" class="text-center">Actions</th>
                    <th style="width:30%;" >N°Dossier</th>
                    <th style="width:35%;" >Importateur</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($dossiers as $dossier)
                    @if ($dossier->dateValidation!="" && $dossier->typeChargement!="Vrac" && $dossier->typeChargement!="")
                        
                <tr>

                    <td>                                                                                    
                    <a wire:click.prevent="consulterDossier({{$dossier->id}})"  class="btn btn-link"><i class="fas fa-eye" ></i></a>
                    <a wire:click.prevent="listeConteneur({{$dossier->id}})"  class="btn btn-link"><i class="fas fa-list"></i></a>

                    <button class="btn btn-link" wire:click="confirmSaisie('{{$dossier->id}}')"  ><i class="fas fa-plus-circle" ></i></button>
                    </td>
                    <td>{{$dossier->numDossier}}</td>
                    <td>{{$dossier->client->raisonSocial ?? ''}}</td>
                </tr>
                   
                @else
                <tr>
                    <td colspan="3" ><h6 class="badge bg-danger">Ce dossier n'est pas encore validé ou non pris en compte! Merci.</h6></td>
                </tr>
                @endif
                    
            @endforeach

            </tbody>
            </table>

        </div>
    
    </div>
    
    
    <div class="card float-right" style="width:45%">
            <div class="card-header bg-info" >
                <h5 class=" mr-1 d-block flex-grow-1"><i class="nav-icon fas fa-boxes fa-lg mr-1"></i>Liste des conteneurs</h5>
            </div>
            <div class="card-body table-responsive p-0 table-striped" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:50%" >N°Conteneur</th>
                    <th style="width:30%" >Type</th>
                    <th style="width:20%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conteneurs as $conteneur)
                    @if ($conteneur->dossier_id==$idDossierConteneur)
                    
                <tr>
                    <td>{{$conteneur->numTc}}</td>
                    <td>{{$conteneur->typeTc}}</td>
                   <td class="text-center">
                    <a wire:click='goToEditConteneur({{$conteneur->id}})' class="btn btn-link" ><i class="far fa-edit"></i></a>
                    <button class="btn btn-link" wire:click="confDelete('{{$conteneur->id}}','{{$conteneur->numTc}}')"><i class="fas fa-trash-alt {{evisible()}}" ></i></button>
                    </td>
                   
                </tr>
    
                    @endif
            @endforeach

            </tbody>
            </table>
            </div>

 
                    <div class="row">
                        @if ($isListe)
                        <div class="col-4 text-danger">
                             <b>Total :</b>  {{ $nbreTc }}
                             
                        </div>
                        <div class="col-4 text-primary">
                             <b>Tc20':</b>  {{ $nbreTcVingt }}
                        </div>
                        <div class="col-4 text-primary">
                             <b>Tc40':</b>  {{ $nbreTcQuaran }}
                        </div>
                    @endif
                        
                    </div>
                   
            
                </div>
            </div>

    </div>
   
</div>

<script>
    window.addEventListener("showConfirmMessage",event=>{
      Swal.fire({
  title: event.detail.message.title,
  text: event.detail.message.text,
  icon: event.detail.message.type,
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Continuer',
  cancelButtonText: 'Annuler'
}).then((result) => {
  if (result.isConfirmed) {
    if(event.detail.message.data){

                @this.saisieConteneur()
                
          }
  }
})
 })

</script>

<script>
    window.addEventListener("confirmMessageDel",event=>{
      Swal.fire({
  title: event.detail.message.title,
  text: event.detail.message.text,
  icon: event.detail.message.type,
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Continuer',
  cancelButtonText: 'Annuler'
}).then((result) => {
  if (result.isConfirmed) {
    if(event.detail.message.data){

                @this.deleteCont(event.detail.message.data)
                
          }
  }
})
 })

</script>


<script>
    window.addEventListener("showSuccesMessageSup",event=>{
       Swal.fire({
  position: 'top-end',
  icon:"success",
  title: event.detail.message || "Opération effectuée avec succès!",
  showConfirmButton: false,
  timer: 1500
})
 })

</script>


