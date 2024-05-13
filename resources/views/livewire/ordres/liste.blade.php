<div class="row p-4 pt-5">
        <div class=" mb-3 badge bg-indigo text-xl" style="width:100%">
                    <i class="fab fa-first-order mr-4"></i>Ordre de livraison
        </div>
        <div class="card card-primary " style="width:100%">
                
        <form role= "form" >
            @csrf
            <div class="card-body">
                <div class="input-group mt-3 mb-3">
                                                    
                    <input type="text" name="search"  wire:model.lazy="search" class="form-control form-control-lg bg-dark " placeholder="N°Dossier à rechercher">
                                                
                        <div class="input-group-append">
                            <button wire:click.prevent='findDossier({{$dossier->id ?? 'Code not found'}})'  class="btn btn-lg btn-default" >
                            <i class="fa fa-search"></i></button>
                        </div>
                </div>
                <div class="row">
                     <div class="col-12">
                       @if ( $this->vMessage==false )
                            <div class="badge bg-info float-right">Aucun résultat trouvé</div>
                           
                        @endif
                    </div>
                </div>    
                
            </div>

            <div class="card-footer float-right">
               
             </div>

        </form>
    </div>
</div>



