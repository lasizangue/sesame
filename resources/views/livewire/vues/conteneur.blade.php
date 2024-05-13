@section("titre")
    Nombre de conteneurs par client par période
@endsection

<div class="row pl-4 pt-2 text-dark">
     <div class="mr-4"><h2>Dashboard - Nombre de conteneurs par client par période</h2></div>
     <div><button type="button" class="btn btn-block btn-outline-dark btn-lg ml-5" wire:click.prevent='goToMenu()'>Retour</button></div> 
</div>

<div class="row pl-4 pt-2">
     <div class="col-12">
          <div class="card">

        <form role="form">
            @csrf
          <div class="card-header bg-dark">
               <div class="row">
                    <div class="col-2">
                         <div class="form-group">
                                    <label>Du</label>
                                    <input type="date" wire:model="duC" class="form-control">
                         </div>
                    </div>
                    <div class="col-2">
                         <div class="form-group">
                                    <label>Au</label>
                                    <input type="date" wire:model="auC" class="form-control">
                         </div>
                    </div>
                    <div class="col-3">
                         <div class="form-group">
                                    <label>Client</label>
                                    <select name="clientRC" id="clientRC" wire:model="vClient_idC" class="form-control">
                                        <option value="">---------</option>
                                   @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                                    @endforeach
                                    </select>
                         </div>
                    </div>
                    <div class="col-3 ml-5">
                          <h6>Nbre TC 20' : {{ $nbreTcVingt }}</h6>
                          <h6>Nbre TC 40' : {{ $nbreTcQuara }}</h6>
                          <h6>Total TCs : {{ $nbreTc }}</h6>

                    </div>

               </div>  
          </div>
          </form>
          
          <div class="card-body table-responsive p-0 table-striped">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:50%" >N°TC</th>
                    <th style="width:50%" >Type</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($conteneurs as $conteneur)
                 
                    <tr>
                        <td>{{$conteneur->numTc}}</td>
                        <td>{{$conteneur->typeTc}}</td>
                        
                    </tr>
                    
                    
                @empty
                    
                    <tr>
                        <td colspan="2">
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
