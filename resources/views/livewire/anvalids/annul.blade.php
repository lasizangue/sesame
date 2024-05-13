@section("titre")
    Annulation dossier tiré - Transit général rapide
@endsection

<div >
 <div class="row ml-4  mb-0 justify-content-center">
          <h1 class="mt-4 text-maroon p-2" >Annulation de validation</h1>    
  </div>
  <form role= "form" wire:submit.prevent='confirmMessage()' method="POST">
            @csrf
 <div class="row ml-4 mt-2 justify-content-center" >
       
               <div class="input-group mb-4" style="width: 350px;">

                    <input type="text" wire:model.lazy="findDossier" class="form-control form-control-lg" placeholder="Recherche n°validation à annuler" style="border:solid 2px; border-color:green; font-style:italic;">
               </div>

                    <div class="input-group-append">     
                              <div><button  wire:click.prevent='rechercheDossierAannuler()'    class="btn btn-success ml-1">
                              <i class="fa fa-search" style="height: 30px"></i>
                             </button></div>

                             <button type="submit" class="btn btn-warning ml-1" style="height:47px;">Annuler la validation 
                            </button>             
                    </div>
</div>
</form>     

<div class="row ml-4">    
        <div class="card" style="width: 95%">
            
            <div class="card-body" style="height: 300px;">
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
                <div class="col-3">
                    <div class="form-group" >
                        <label>Type dossier</label>
                        <input type="text" wire:model="editDossier.typeDossier" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                    <label>Client</label>
                        <input type="text" wire:model="vClient" class="form-control" disabled>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-4">
                        <div class="form-group">
                        <label>N°Déclaration</label>
                        <input type="text" wire:model="editDossier.numDeclaration" class="form-control" disabled>
                        </div>
                    </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>N°Liquidation</label>
                            <input type="text" wire:model="editDossier.numLiquidation" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-4">
                        <div class="form-group">
                             <label>Validé le</label>
                             <input type="date" wire:model="editDossier.dateValidation" class="form-control" disabled>
                        </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-6">
                            <div class="form-group">
                                <label>Montant de la déclaration</label>
                                <input type="number" wire:model="editDossier.montanDeclaration" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Circuit</label>
                                <input type="text" wire:model="editDossier.circuit" class="form-control" disabled>            
                            </div>
                         </div>  
                </div>  
          </div>
            
</div>
</div>
     
 
    </div>
</div>
</div>


<script>
            window.addEventListener("showSuccesAucun",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
        })
        })
</script>

<script>
            window.addEventListener("showMessNotpossible",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
        })
        })
</script>

<script>
            window.addEventListener("showMessageDelete",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"info",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
        })
        })
</script>

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

            @this.annuleValide()
                
        }
  }
})
 })

</script>

