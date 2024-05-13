<div class="row p-4 pt-5">

@if (session()->has('message'))
                    <div class="alert alert-info">
                            {{ session('message') }}
                    </div>
@endif
    <div class="col-12">
        <div class="card">
            <form role="form">
                @csrf
            <div class="card-header bg-primary">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="nav-icon fas fa-edit fa-lg mr-1"></i>Table des clients</h3>
            <div class="card-tools d-flex align-items-center">
                <a wire:click.prevent="imprimeListeClient()" class="btn btn-link text-white mr-4"><i class="fas fa-print fa-lg text-white mr-1"></i>Imprimer</a>
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="ajoutClient()"><i class="fas fa-plus mr-1"></i></i>Nouveau client</a>
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce="search" class="form-control float-right" placeholder="Search">
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
                    <th style="width:15%" >ID</th>
                    <th style="width:35%" >Raison social</th>
                    <th style="width:20%" >Compte contribuable</th>
                    <th style="width:15%" class="text-center" >Ajouté</th>
                    <th style="width:15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->raisonSocial}}</td>
                    <td>{{$client->compteContrib}}</td>
                    <td class="text-center">{{$client->created_at->diffForHumans()}}</td>
                    <td class="text-center">
                    <button class="btn btn-link" wire:click='goToEditClient({{$client->id}})'><i class="far fa-edit"></i></button>
                    <button class="btn btn-link {{evisible()}}" wire:click="confirmDelete({{$client->id}})"><i class="fas fa-trash-alt  " ></i></button>
                    </td>
                
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
            <div class="card-footer">
                
                <div class="float-right">
                    {{$clients->links()}}
                </div>
                    
            </div>
        </div>
    </div>
    </div>

 

    

    

   