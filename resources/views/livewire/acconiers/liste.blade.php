<div class="row">
          <div class="col-6 mt-2 text-indigo">
               <h2>Acconiers</h2>    
          </div>
          <div class="col-6 mt-2">
                   <div class="float-right"><button type="button" class="btn btn-block btn-outline-dark btn-lg " wire:click.prevent='retour()'>Retour</button></div>
          </div>
</div>
<div class="row>">
<div class="card mt-3">
    <form role= "form" >
       @csrf 
            <div class="card-header bg-primary">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="fas fa-warehouse fa-lg mr-1"></i>Table des acconiers</h3>
              
            <div class="card-tools d-flex align-items-center">
                
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="ajoutAcconier()"><i class="fas fa-plus mr-1"></i>Nouveau acconier</a>
                <div class="input-group input-group-sm" style="width: 250px;">
                  
                    <input type="text" name="table_search" wire:model.debounce="search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append ml-2">
                        
                        <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                        </button>
                        
                    </div>
                </div>

            </div>
            
        </div>
        </form>

        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:15%" >ID</th>
                    <th style="width:50%" >Acconier</th>
                    <th style="width:20%" class="text-center">Ajouté</th>
                    <th style="width:15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($acconiers as $acconier)
                <tr>
                    <td>{{$acconier->id}}</td>
                    <td>{{$acconier->nomAcconier}}</td>
                    <td class="text-center">{{$acconier->created_at->diffForHumans()}}</td>
                    <td class="text-center">
                    <button class="btn btn-link" wire:click='goToEditAcconier({{$acconier->id}})'><i class="far fa-edit"></i></button>
                    <button class="btn btn-link {{evisible()}}" wire:click="confirmDelete({{$acconier->id}})"><i class="fas fa-trash-alt" ></i></button>
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
            <div class="card-footer">
                <div class="float-right">
                    {{$acconiers->links()}}
                </div>    
            </div>
        </div>
        </div>
        