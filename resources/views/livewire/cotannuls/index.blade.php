@section("titre")
    Annulation des cotations - Transit général rapide
@endsection
<div wire:ignore.self>
          
          <div class="row  p-4 pt-5 ">
          <div class=" mb-3 badge bg-warning" style="width:100%">
                    <h2 >Annulation d'une cotation</h2>
          </div>
            <div class="card card-primary " style="width:100%" >
                
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-8 offset-md-2">
                            <form role= "form">
                                @csrf
                                <div class="input-group mt-3 mb-3">
                                    <input type="text" wire:model.lazy="search" wire:keydown.enter='confirmAnnul()' class="form-control form-control-lg bg-dark" placeholder="Recherche n°dossier" style="border:solid 2px; border-color:red; font-style:italic;">

                                    <div class="input-group-append">
                                        <button  wire:click.prevent='confirmAnnul()' class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                        </button>
                                    </div>

                                    </form>
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
                        <input type="date" wire:model="editDossier.dateCotation" class="form-control " disabled>
                        
                        </div>
                    </div>
                    
                    </div>
                    <div class="row">
                    
                        <div class="col-12">
                        <div class="form-group">
                        <label>Nom de l'agent</label>
                        <input type="text" wire:model="editDossier.agentCotation" class="form-control" disabled>
                    
                    </div>
                    
                    </div>
                    
                    </div>

                    </div>
                   
                   
                    <div class="card-footer ">
                            <div class="float-right">
                            
                        
                            </div>
                    </div>
                
                 </form>
            </div>
            

        </div>
</div>

{{--Interception du message de création--}}
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

                @this.annulCotation()
                
          }
  }
})
 })

</script>

{{--Interception du message de création--}}
<script>
    window.addEventListener("showSuccesMessageAnnul",event=>{
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
