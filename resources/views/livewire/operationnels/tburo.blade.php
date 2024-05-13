
    
        <div class="card" style="width:100%">
            <form role="form">
                @csrf
            <div class="card-header bg-dark ">
                
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="far fa-building fa-lg mr-1"></i>Table des bureaux</h3>
                 
            <div class="card-tools d-flex align-items-center">
                
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce="searchb" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">

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
                    <th style="width:15%" >Code</th>
                    <th style="width:50%" >Bureau</th>
                    <th style="width:20%" class="text-center">Ajouté</th>
                    <th style="width:15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buros as $buro)
                <tr>
                    <td>{{$buro->code}}</td>
                    <td>{{$buro->libelle}}</td>
                    <td class="text-center">{{$buro->created_at->diffForHumans()}}</td>
                    <td class="text-center">
                    <button class="btn btn-link" wire:click='goToEditBuro({{$buro->id}})'><i class="far fa-edit"></i></button>

                    <button class="btn btn-link {{evisible()}}" wire:click="deleteBuro({{$buro->id}})"><i class="fas fa-trash-alt" ></i></button>
                    
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
            
        </div>
    
    

 

    

    

   