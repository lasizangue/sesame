<div class="row pl-4 pt-2 text-success">
     <div class="mr-4"><h2>Dashboard - Liste des clients</h2></div>
     <div><button type="button" class="btn btn-block btn-outline-dark btn-lg ml-5" wire:click.prevent='goToMenu()'>Retour</button></div> 
</div>

<div class="row pl-4 pt-2">
     <div class="col-12">
          <div class="card">
          <form role="form">
               @csrf
          <div class="card-header bg-warning">
               <div class="row">
                    <div class="col-5">
                         <h4></h4>
                    </div>
                    <div class="col-7">
                         
                         <div class="input-group-append">
                              <input type="search" wire:model.debounce="searchcli"  class="form-control form-control-md mr-1" placeholder="Critères de recherche" style="border:solid 2px; border-color:red; font-style:italic;">
                              <button type="submit" class="btn btn-md btn-default">
                                   <i class="fa fa-search"></i>
                              </button>
                         </div>
                    </div>
               </div>  
          </div>
          </form>
          
          <div class="card-body table-responsive p-0 table-striped">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:35%" >Raison social</th>
                    <th style="width:20%" >Compte contribuable</th>
                    <th style="width:25%" >Adresse</th>
                    <th style="width:20%" >Contact</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($cliens as $clien)
                  
                    <tr>
                        <td>{{$clien->raisonSocial}}</td>
                        <td>{{$clien->compteContrib}}</td>
                        <td>{{$clien->adresse}}</td>
                        <td>{{$clien->contact}}</td>
                    </tr>
                    
                @empty
                    
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-danger alert-dismissible">
                                    <h5><i class="icon fas fa-ban"></i> Information !</h5>
                                    Aucune donnée trouvée par rapport aux éléments de recherche entrés
                            </div>
                        </td>
                    </tr>
                @endforelse
             </tbody>
          </table>
        </div>
     </div>
     </div>
</div>
