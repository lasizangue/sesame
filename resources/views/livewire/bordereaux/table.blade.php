
        <div class="row  p-4 pt-5 ">
                <div class=" mb-3 badge bg-indigo" style="width:100%">
                    <h2 ><i class="fas fa-dolly-flatbed">  Effectuer une livraison</i></h2>
                </div>
            <div class="card card-primary" style="width:100%" >
                <form role="form">
                    @csrf
                                <div class="card-body">
                                
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                                <div>
                                                    <label class="mr-4"><input type="radio" wire:model="mise" value="p">Prépa.mise en livraison</label>

                                                    <label class="mr-4"><input type="radio" wire:model="mise" value="m">Mise en livraison</label>

                                                    <label><input type="radio" wire:model="mise" value="l">Livraison</label>

                                                </div>
                                            
                                            @if ($mise=='p')
                                            
                                                <div class="input-group mt-3 mb-3">
                                                    
                                                    <input type="text" name="search"  wire:model.lazy="search" class="form-control form-control-lg bg-success " placeholder="N°Dossier à rechercher">
                                                
                                                    <div class="input-group-append">
                                                        <button wire:click.prevent='ficheLvraison({{$dossier->id ?? 'Code not found'}})'  class="btn btn-lg btn-default" >
                                                         <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        @if ( $this->vMessage==false )
                                                            <div class="badge bg-danger float-right">Ce dossier n'est pas validé !</div>
                                                         @else
                                                        @endif 
                                                    </div>
                                                </div>    

                                            @endif

                                            @if ($mise=='m')
                                                
                                                <div class="input-group mt-3 mb-3">
                                                    
                                                    <input type="text" name="search"  wire:model.lazy="search" class="form-control form-control-lg bg-success " placeholder="N°Dossier à rechercher">
                                                
                                                    <div class="input-group-append">
                                                        <button wire:click.prevent='ficheMlivraison({{$dossier->id ?? 'Code not found'}})'  class="btn btn-lg btn-default" >
                                                         <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-12">
                                                       @if ($vdateNav==false) 
                                                        <div class="badge bg-danger float-right">La préparation de mise en livraison est incomplète !</div>
                                                         @else
                                                        @endif 
                                                    </div>
                                                </div>
                                                
                                                
                                            @endif

                                             @if ($mise=='l')
                                                <div class="input-group mt-3 mb-3">
                                                
                                                    <input type="text" name="search"  wire:model.lazy="search" class="form-control form-control-lg bg-warning " placeholder="N°Dossier à rechercher">
                                                
                                                    <div class="input-group-append">
                                                        <button wire:click.prevent='livraison({{$dossier->id ?? 'Code not found'}})'  class="btn btn-lg btn-default" >
                                                         <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        @if ( $this->vMesLivraison==false )
                                                            <div class="badge bg-warning float-right">Ce dossier n'est pas encore mis en livraison !</div>
                                                         @else
                                                        @endif 
                                                    </div>
                                                </div>    
                                            @endif
                                           
                                        </div>
                                    </div>
                                </form>
                                </div>
                   
                   
                                    <div class="card-footer ">
                                        
                                    </div>   
            </div>
        </div>







